function pavementCond(to_php) {
    console.log("pavement summondes");
    let mode = 4;

    let currentType = "Driving";
    let pm25Data = {
        good: 0,
        fair: 0,
        poor: 0,
        no_data:0,

        tot_miles: 0,
        poor_mi_perc: 0,
        tot_poor_mi: 0,

        tx_miles: 0,
        tx_poor_mi: 0,
        tx_poor_mi_perc: 0,

        nm_miles: 0,
        nm_poor_mi: 0,
        nm_poor_mi_perc: 0,

        latestYear: 0
    }

    let color = '#03A9F4'; // default
    let php_handler = "";
    let shape = "shape";
    if (mode == 4) {
        php_handler = "../../docs/js/map_resources/line_handler.php";
    }



    console.log(php_handler);
    console.log(to_php);
    $.get(php_handler, to_php, function (data) { // ajax call to populate pavement lines
        console.log(data);
        let poorconditionMiles = 0;
        let poorconditionMilesTX = 0;
        let poorconditionMilesNM = 0;



        for (index in data.shape_arr) { // iterates through every index in the returned element (data['shape_arr'])
            let shp = data.shape_arr[index][shape]; // shape is LINESTRING or MULTILINESTRING
            let reader = new jsts.io.WKTReader(); // 3rd party tool to handle multiple shapes
            let r = reader.read(shp); // r becomes an object from the 3rd party tool, for a single shp
            let to_visualize = []; // used to populate the map (latitude & longitude)
            let coord; // will be an object to push coordinates to populate the map
            let ln = r.getCoordinates(); // parses the shape into lat & lng

            //PMS Data
            let iri = parseInt(data.shape_arr[index].iri);
            let miles = parseFloat(data.shape_arr[index].miles);
            let state = data.shape_arr[index].state_code;
            let type = data.shape_arr[index].mode;
            let beginning = data.shape_arr[index].begin_poin;
            let end = data.shape_arr[index].end_point;
            let route_name = data.shape_arr[index].route_name;

            if(route_name == null){
                route_name = "route name not availble";
            }

            // makes sure to only calculate the current mode
            if (type == currentType) {
                if(iri == 0){
                    pm25Data.no_data += miles;
                }
                else if (iri > 0 && iri < 95) {
                    pm25Data.good += miles;
                } else if (iri > 94 && iri < 171) {
                    pm25Data.fair += miles;
                } else if (iri > 170) {
                    pm25Data.tot_poor_mi += miles;
                    if (state == 48 || state == "Texas") {
                        pm25Data.tx_poor_mi += miles;
                    } else if (state == 35 || state == "New Mexico") {
                        pm25Data.nm_poor_mi += miles;
                    }
                }
            }


            if (mode == 1 || mode == 2 || mode == 4) {
                for (let i = 0; i < ln.length; i++) {
                    coord = {
                        lat: ln[i]['y'],
                        lng: ln[i]['x']
                    }; // this is how lat & lng is interpreted by the tool
                    to_visualize.push(coord); // pushing the interpretation to our to_visualize array
                }
                // filter colors 
                if (iri > 0 && iri < 95) {
                    color = '#8BC34A'; //green
                } else if (iri > 94 && iri < 171) {
                    color = '#F57C00'; //orange
                } else if (iri > 170) {
                    color = '#d50000'; //red
                } else if (iri == 0) { // No data
                    color = '#9E9E9E';
                }
                let line = new google.maps.Polyline({ // it is a POLYLINE
                    path: to_visualize, // polyline has a path, defined by lat & lng 
                    strokeColor: color,
                    strokeOpacity: .50,
                    strokeWeight: 4,
                    zIndex: 99 // on top of every other shape
                });

                //By adding paragraphs allows line break since \n did not work
                var infoWindow = new google.maps.InfoWindow({
                    content:( 
                        "<p>" + "Iri: "+ commafy(parseInt(iri)) + "<br />" +
                        "Beginning: " + beginning    + "<br />" +
                        "End: " + end   + "<br />" +
                        "Route Name: " + route_name  + "</p>"
                    )
                });
                // Hover Effect for Google API Polygons
                google.maps.event.addListener(line, 'mouseover', function (event) {
                    infoWindow.setPosition(event.latLng);
                    infoWindow.open(map);
                });
    
                google.maps.event.addListener(line, 'mouseout', function (event) {
                   infoWindow.close();
                });


                line.setMap(map);
                polylines.push(line);
            }

        }


        //totals
        pm25Data.tot_poor_mi = (pm25Data.nm_poor_mi + pm25Data.tx_poor_mi).toFixed(2);
        pm25Data.tot_miles = pm25Data.tx_miles + pm25Data.nm_miles;

        // Dynamic Text Calculations Percentages
        pm25Data.poor_mi_perc = ((pm25Data.tot_poor_mi / pm25Data.tot_miles) * 100).toFixed(2);
        pm25Data.tx_poor_mi_perc = ((pm25Data.tx_poor_mi / pm25Data.tx_miles) * 100).toFixed(2);
        pm25Data.nm_poor_mi_perc = ((pm25Data.nm_poor_mi / pm25Data.nm_miles) * 100).toFixed(2);
        console.log(pm25Data);
    });

}

function drawLines(circleCordinates) {
    let cord = [];
    let obj = {
        type: 'LineString',
        coordinates: []
    }

    for (let i = 0; i < circleCordinates[0].length; i += 2) {
        cord.push(circleCordinates[0][i][1]);
        cord.push(circleCordinates[0][i][0]);

        obj.coordinates.push(cord);
        cord = null;
        cord = [];
    }
    obj = JSON.stringify(obj);

    to_php = {
        'AOI': obj,
        'Table_wanted': 'pm25_form_project'
    }
    pavementCond(to_php);
}
