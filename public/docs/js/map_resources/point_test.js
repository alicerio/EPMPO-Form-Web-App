/** 
 * For testing purposes
 *  
 */


//checks if point C is inside A and B
function insideRange(pointA, pointB, pointC) {
    if (differencePositive(distance(pointA, pointC) + distance(pointB, pointC), distance(pointA, pointB)) <= 0.00009) {
        return true
    }
    return false;
}

function differencePositive(val1, val2) {
    if (val1 > val2) {
        return val1 - val2;
    } else {
        return val2-val1;
    }
}

// formula to check if a point lies between 2 points
function distance(pointA, pointB) {
    //   console.log(Math.sqrt(Math.pow((pointA.lng - pointB.lng), 2) + Math.pow((pointA.lat - pointB.lat), 2)));
    return Math.sqrt(Math.pow((pointA.lng - pointB.lng), 2) + Math.pow((pointA.lat - pointB.lat), 2));
}

function filterCrashes(circlesCordinates) {
    let php_handler = "../../docs/js/map_resources/map_handler.php";

    let key = 'all_pm26';
    data_for_php = {
        key: key
    };
    let shape = "shape";
    let filter_crashes = [];

    let pointA = {
        lat: circlesCordinates[0][0][0],
        lng: circlesCordinates[0][0][1]
    };
    let pointB = {
        lat: circlesCordinates[0][299][0],
        lng: circlesCordinates[0][299][1]
    };
  
    //get all points
    $.get(php_handler, data_for_php, function (data) {
        for (index in data.shape_arr) {
            holder = [];
            holder.push(wktFormatterPoint(data.shape_arr[index][shape]));
            holder = holder[0][0]; // Fixes BLOBs
            let pointC = {
                lat: parseFloat(holder[0].lat),
                lng: parseFloat(holder[0].lng)
            };

            if (insideRange(pointA, pointB, pointC)) {
                filter_crashes.push(pointC);
            }
        }
        console.log(filter_crashes);
      //  alert('entering 26');
        pm26Data(circlesCordinates, filter_crashes);
    });


}

function pm26Data(circlesCordinates, filterCrashes) {
    let mode = 1;
    let data_for_php = 0;
    let shape = "shape";
    let php_handler = "../../docs/js/map_resources/map_handler.php";

    let key = 'all_pm26';
    data_for_php = {
        key: key
    };

    let image = "../../docs/images/small_blue_pin.png";

    for(j in circlesCordinates[0]){
        for (index in filterCrashes) { // Organize information into dictionaries
            if(check_a_point(filterCrashes[index].lng, filterCrashes[index].lat,circlesCordinates[0][j][1], circlesCordinates[0][j][0], 0.004254 )){
                let point = new google.maps.Marker({
                    position: filterCrashes[index],
                    title: filterCrashes[index].lat + " " + filterCrashes[index].lng,
                    icon: image
                });
        
                point.setMap(map);
                points.push(point);
            }
        }
    }
}

function normalDraw() {
    let mode = 1;
    let pm26Data = {
        goodTX: 0,
        fairTX: 0,
        poorTX: 0,
        noDataTX: 0,

        goodNM: 0,
        fairNM: 0,
        poorNM: 0,
        noDataNM: 0,

        tx_good_count: 0,
        tx_fair_count: 0,
        tx_poor_count: 0,
        tx_no_data_count: 0,

        nm_good_count: 0,
        nm_fair_count: 0,
        nm_poor_count: 0,
        nm_no_data_count: 0,

        dynamicTot: 0,
        dynamicPoor: 0,

        totTXBridges: 0,
        totNMBridges: 0,
        tnodatabridges: 0,

        lowestRating: 0
    };

    let data_for_php = 0;
    let shape = "shape";
    let php_handler = "docs/js/map_resources/map_handler.php";

    if (mode == 0 || mode == 1) { // if we want regional (default) data
        let key = 'all_pm26';
        data_for_php = {
            key: key
        };
    }

    console.log(php_handler);
    console.log(data_for_php);

    $.get(php_handler, data_for_php, function (data) {
        console.log("returned");
        console.log(data);
        let image = "../../docs/images/crash.png";
        
        let condition = '';
        var lowestRating = 0;

        for (index in data.shape_arr) { // Organize information into dictionaries
            let deck_cond_ = parseInt(data.shape_arr[index]['deck_cond_']);
            let superstruc = parseInt(data.shape_arr[index]['superstruc']);
            let substruc_c = parseInt(data.shape_arr[index]['substruc_c']);
            let region = data.shape_arr[index]['region'];
            let type = data.shape_arr[index]['mode'];
            //  let typeHolder = currentType;
            lowestRating = Math.min(deck_cond_, superstruc, substruc_c);

            let holder = [];

            if (mode == 1 || mode == 2 || mode == 4) { // mode 1 and 2 allows us to draw points 
                holder.push(wktFormatterPoint(data.shape_arr[index][shape]));
                holder = holder[0][0]; // Fixes BLOBs
                let to_visualize = {
                    lat: parseFloat(holder[0].lat),
                    lng: parseFloat(holder[0].lng)
                };
                let titleH = condition + ": " + lowestRating;
                if (lowestRating == 999) {
                    titleH = condition;
                }
                let point = new google.maps.Marker({
                    position: to_visualize,
                    title: titleH,
                    // value: '',
                    icon: image
                });
                // draw by 1 type at a time

                point.setMap(map);
                points.push(point);


            }

        }

        // tot counts
        let totTX = pm26Data.tx_good_count + pm26Data.tx_fair_count + pm26Data.tx_poor_count + pm26Data.tx_no_data_count;
        let totNM = pm26Data.nm_good_count + pm26Data.nm_fair_count + pm26Data.nm_poor_count + pm26Data.nm_no_data_count;
        let totBad = pm26Data.tx_poor_count + pm26Data.nm_poor_count;
        let mpoArea = totTX + totNM;
        let mpo = ((totBad / mpoArea) * 100).toFixed(2);

        pm26Data.tnodatabridges = pm26Data.tx_no_data_count + pm26Data.nm_no_data_count;
        pm26Data.dynamicTot = pm26Data.totTXBridges + pm26Data.totNMBridges;
        pm26Data.dynamicPoor = (((pm26Data.tx_poor_count + pm26Data.nm_poor_count) / pm26Data.dynamicTot) * 100).toFixed(2);

        //formulas
        if (pm26Data.tx_good_count != 0) {
            pm26Data.goodTX = ((pm26Data.tx_good_count / pm26Data.dynamicTot) * 100).toFixed(2);
        }
        if (pm26Data.tx_fair_count != 0) {
            pm26Data.fairTX = ((pm26Data.tx_fair_count / pm26Data.dynamicTot) * 100).toFixed(2);
        }
        if (pm26Data.tx_poor_count != 0) {
            pm26Data.poorTX = ((pm26Data.tx_poor_count / pm26Data.dynamicTot) * 100).toFixed(2);
        }
        if (pm26Data.tx_no_data_count != 0) {
            pm26Data.noDataTX = ((pm26Data.tx_no_data_count / pm26Data.dynamicTot) * 100).toFixed(2);
        }
        //nm
        if (pm26Data.nm_good_count != 0) {
            pm26Data.goodNM = ((pm26Data.nm_good_count / pm26Data.dynamicTot) * 100).toFixed(2);
        }
        if (pm26Data.nm_fair_count != 0) {
            pm26Data.fairNM = ((pm26Data.nm_fair_count / pm26Data.dynamicTot) * 100).toFixed(2);
        }
        if (pm26Data.nm_poor_count != 0) {
            pm26Data.poorNM = ((pm26Data.nm_poor_count / pm26Data.dynamicTot) * 100).toFixed(2);
        }
        if (pm26Data.nm_no_data_count != 0) {
            pm26Data.noDataNM = ((pm26Data.nm_no_data_count / pm26Data.dynamicTot) * 100).toFixed(2);
        }

        if (mode == 1) {
            // regionalText(pm26Data);
        }

    });
}


function check_a_point(x, y, circlex, circley, r) {
   // console.log(x + " " + y + " " + circlex + " " + circley + " " + r);
    var dist = (x - circlex) * (x - circlex) + (y - circley) * (y - circley);
    r *= r;
    if (dist < r) return true;
    return false;

    /*
        var dist_points = (a - x) * (a - x) + (b - y) * (b - y);
        r *= r;
        if (dist_points < r) {
            return true;
        }
        return false;
        */
}