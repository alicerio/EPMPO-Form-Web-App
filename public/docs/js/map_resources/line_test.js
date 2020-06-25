function pavementCond(to_php) {
    let color = '#03A9F4'; // default
    let shape = "shape";
    let php_handler = "../../docs/js/map_resources/line_handler.php";

    $.get(php_handler, to_php, function (data) { // ajax call to populate pavement lines
        console.log(data);

        for (index in data.shape_arr) { // iterates through every index in the returned element (data['shape_arr'])
            let shp = data.shape_arr[index][shape]; // shape is LINESTRING or MULTILINESTRING
            let reader = new jsts.io.WKTReader(); // 3rd party tool to handle multiple shapes
            let r = reader.read(shp); // r becomes an object from the 3rd party tool, for a single shp
            let to_visualize = []; // used to populate the map (latitude & longitude)
            let coord; // will be an object to push coordinates to populate the map
            let ln = r.getCoordinates(); // parses the shape into lat & lng

            //PMS Data
            let iri = parseInt(data.shape_arr[index].iri);
            let end_point = parseFloat(data.shape_arr[index].end_point);
            let begin_point =  parseFloat(data.shape_arr[index].begin_poin);
            let through_lanes =  parseFloat(data.shape_arr[index].through_la);

            let currentLaneMiles = (end_point - begin_point) * through_lanes;
            let cond = "";
            // makes sure to only calculate the current mode
            //  if (type == currentType) {

            if (iri == 0) { // No data
                color = '#9E9E9E';
                cond = "No Data";
                currentLaneMiles = 0;
            } else if (iri > 0 && iri < 95) {
                color = '#8BC34A'; //green
                cond = "Good";
                pavementsData.good += currentLaneMiles;
            } else if (iri > 94 && iri < 171) {
                color = '#F57C00'; //orange
                cond = "Fair";
                pavementsData.fair += currentLaneMiles;
            } else if (iri > 170) {
                color = '#d50000'; //red
                cond = "Poor";
                pavementsData.poor += currentLaneMiles;
            }

            for (let i = 0; i < ln.length; i++) {
                coord = {
                    lat: ln[i]['y'],
                    lng: ln[i]['x']
                }; // this is how lat & lng is interpreted by the tool
                to_visualize.push(coord); // pushing the interpretation to our to_visualize array
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
                content: (
                    "<p>" + "2018 Condition: " + cond + "<br /> " +
                    "Lanem Miles: " + currentLaneMiles.toFixed(2) + "</p>"
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

        console.log(pavementsData);
        document.getElementById("good_pavement").value = pavementsData.good;
        document.getElementById("fair_pavement").value = pavementsData.fair;
        document.getElementById("poor_pavement").value = pavementsData.poor;
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
        'Table_wanted': 'pavements2018'
    }
    pavementCond(to_php);
}
