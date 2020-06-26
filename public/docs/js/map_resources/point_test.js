/** 
 * Handles point section on map
 *  
 */

// const {
//     cond
// } = require("lodash");

function setAll(val) {
    Object.keys(crashesData).forEach(function (index) {
        crashesData[index] = val
    });
}

function clearCrashesData() {
    setAll(0);
    /*
    document.getElementById("").innerHTML = crashesData.classA;
    document.getElementById("").innerHTML = crashesData.classB;
    document.getElementById("").innerHTML = crashesData.classC;
    document.getElementById("").innerHTML = crashesData.injured_driving;
    document.getElementById("").innerHTML = crashesData.injured_walking;
    document.getElementById("").innerHTML = crashesData.injured_freight;
    document.getElementById("").innerHTML = crashesData.injured_biking;
    document.getElementById("").innerHTML = crashesData.killed;
    document.getElementById("").innerHTML = crashesData.killed_Driving;
    document.getElementById("").innerHTML = crashesData.killed_walking;
    document.getElementById("").innerHTML = crashesData.killed_freight;
    document.getElementById("").innerHTML = crashesData.killed_biking;

    document.getElementById("").innerHTML = crashesData.crashCount;
    document.getElementById("").innerHTML = crashesData.crashCountD;
    document.getElementById("").innerHTML = crashesData.crashCountW;
    document.getElementById("").innerHTML = crashesData.crashCountF;
    document.getElementById("").innerHTML = crashesData.crashCountB;
    */
}


//checks if point C is inside A and B
function insideRange(pointA, pointB, pointC) {
    if (differencePositive(distance(pointA, pointC) + distance(pointB, pointC), distance(pointA, pointB)) <= 0.00009) {
        return true
    }
    return false;
}
// returns difference non negative
function differencePositive(val1, val2) {
    if (val1 > val2) {
        return val1 - val2;
    } else {
        return val2 - val1;
    }
}

// formula to check if a point lies between 2 points
function distance(pointA, pointB) {
    return Math.sqrt(Math.pow((pointA.lng - pointB.lng), 2) + Math.pow((pointA.lat - pointB.lat), 2));
}
//filters possible points, this will help eliminate excess of points
function filterCrashes(circlesCordinates) {
    let php_handler = "../../docs/js/map_resources/map_handler.php";

    let key = 'all_pm18_19';
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
        console.log(data);


        for (index in data.shape_arr) {
            holder = [];
            //gets info per iteration
            let type = data.shape_arr[index]['type'];
            let location = data.shape_arr[index]['statefp'];
            let crash_year = parseInt(data.shape_arr[index]['crash_year']);

            let killed = parseInt(data.shape_arr[index]['killed']);
            let non_injuri = parseInt(data.shape_arr[index]['non_injuri']);
            let unknown_injuri = parseInt(data.shape_arr[index]['unknown_in']);
            let classA = parseInt(data.shape_arr[index]['classA']);
            let classB = parseInt(data.shape_arr[index]['classB']);
            let classC = parseInt(data.shape_arr[index]['classC']);
            let classO = parseInt(data.shape_arr[index]['classO']);
            let ogrID = parseInt(data.shape_arr[index]['OGR_FID']);

            holder.push(wktFormatterPoint(data.shape_arr[index][shape]));
            holder = holder[0][0]; // Fixes BLOBs

            //store info on point
            let pointC = {
                lat: parseFloat(holder[0].lat),
                lng: parseFloat(holder[0].lng),
                ogrID: ogrID,
                type: type,
                location: location,
                crash_year: crash_year,
                killed: killed,
                non_injuri: non_injuri,
                unknown_injuri: unknown_injuri,
                classA: classA,
                classB: classB,
                classC: classC,
                classO: classO
            };
            //filter
            if (insideRange(pointA, pointB, pointC)) {
                filter_crashes.push(pointC);
            }
        }
        console.log(filter_crashes);

        crashes(circlesCordinates, filter_crashes);
    });


}
/* checks if a point is inside the non-repeated points list by looking at the ogr id
    helps in not iterating on points that have already been seen ex: point 123 will only be read once
    helps in keeping calculations precise */

function hasItbeenSeen(currentPoint, nonRepeatedPoints) {
    return (nonRepeatedPoints).some(function (nonRepeatedPointsVal) {
        return currentPoint === nonRepeatedPointsVal.ogrID;
    });
}

//draws, filters and stores info
function crashes(circlesCordinates, filterCrashes) {
    //holds all info displayed on statistics
    var nonRepeatedPoints = [];
    let image = "../../docs/images/small_blue_pin.png";
    //console.log(filterCrashes);
    for (j in circlesCordinates[0]) {
        for (index in filterCrashes) { // Organize information into dictionaries
            if (isInsideCircle(filterCrashes[index].lng, filterCrashes[index].lat, circlesCordinates[0][j][1], circlesCordinates[0][j][0], 0.004254)) {
                if (hasItbeenSeen(filterCrashes[index].ogrID, nonRepeatedPoints) == false) {
                    nonRepeatedPoints.push(filterCrashes[index]);
                    // define variables this way so its easier to manipulate
                    //console.log(filterCrashes[index]['ogrID']);
                    let type = filterCrashes[index]['type'];
                    let location = filterCrashes[index]['location'];
                    let crash_year = parseInt(filterCrashes[index]['crash_year']);
                    let killed = parseInt(filterCrashes[index]['killed']);
                    let classA = parseInt(filterCrashes[index]['classA']);
    
                    let isFatal = "YES_NO";
                    let isSerious  = "YES_NO"; 
                    let isPedBike = "YES_NO";

                    if(location == "48"){
                        crashesData.total_crashes_tx++;
                        crashesData.fatal_crashes_tx += killed;
                        crashesData.serious_injury_crashes_tx += classA;
                       
                    }else if(location == "35"){
                        crashesData.total_crashes_nm++;
                        crashesData.fatal_crashes_nm += killed;
                        crashesData.serious_injury_crashes_nm += classA;
                    }

                    if(killed > 0){
                        isFatal = "Yes";
                    }else{
                        isFatal = "No";
                    }

                    if(crypto > 0 ){
                        isSerious = "Yes";
                    }else{
                        isSerious = "No";
                    }
                    isPedBike = "No";
                    //filter by type
                    if (type == "Pedestrian" || type == "PED") {
                        image = "../../docs/images/ped.png";
                        isPedBike = "Yes";
                        if(location == "48"){
                            crashesData.ped_bike_crashes_tx;
                         
                        }else if(location == "35"){
                            crashesData.ped_bike_crashes_nm;
                        }
                    } else if (type == "Commerical_Vehicles" || type == "COMV") {
                        image = "../../docs/images/truck.png";
       
                    } else if (type == "GEN") {
                        image = "../../docs/images/crash.png";
                   
                    } else if (type == "Pedcyclists" || type == "BIKE") {
                        image = "../../docs/images/cyclist.png";
                        isPedBike = "Yes";
                        if(location == "48"){
                            crashesData.ped_bike_crashes_tx;
                        }else if(location == "35"){
                            crashesData.ped_bike_crashes_nm;
                        }
                    } else if (type == "BIKE_COMV") {
                        image = "../../docs/images/cyclist.png";
                        isPedBike = "Yes";
                        if(location == "48"){
                            crashesData.ped_bike_crashes_tx;
                        }else if(location == "35"){
                            crashesData.ped_bike_crashes_nm;
                        }
                    } else if (type == "PED_COMV") {
                        image = "../../docs/images/ped.png";
                        isPedBike = "Yes";
                        if(location == "48"){
                            crashesData.ped_bike_crashes_tx;
                        }else if(location == "35"){
                            crashesData.ped_bike_crashes_nm;
                        }
                    }

                    let point = new google.maps.Marker({
                        position: filterCrashes[index],
                        title: "Year: " + crash_year + 
                        "\nFatal Crash: " + isFatal +
                        "\nSerious injury crash: " + isSerious +
                        "\nCrashes involving pedestrians or cyclists: " + isPedBike,
                        icon: image
                    });


                    point.setMap(map);
                    points.push(point);
                }

            }
        }

    }
    document.getElementById("EP_total_crash").value = crashesData.total_crashes_tx;
    document.getElementById("EP_fatal_crash").value = crashesData.fatal_crashes_tx;
    document.getElementById("EP_injury_crash").value = crashesData.serious_injury_crashes_tx;
    document.getElementById("EP_pedestrian_crash").value = crashesData.ped_bike_crashes_tx;

    document.getElementById("DA_total_crash").value = crashesData.total_crashes_nm;
    document.getElementById("DA_fatal_crash").value = crashesData.fatal_crashes_nm;
    document.getElementById("DA_injury_crash").value = crashesData.serious_injury_crashes_nm;
    document.getElementById("DA_pedestrian_crash").value = crashesData.ped_bike_crashes_nm;

    //console.log(nonRepeatedPoints);
    /*
    document.getElementById("").value = crashesData.classA;
    document.getElementById("").value = crashesData.classB;
    document.getElementById("").value = crashesData.classC;
    document.getElementById("").value = crashesData.injured_driving;
    document.getElementById("").value = crashesData.injured_walking;
    document.getElementById("").value = crashesData.injured_freight;
    document.getElementById("").value = crashesData.injured_biking;
    document.getElementById("").value = crashesData.killed;
    document.getElementById("").value = crashesData.killed_Driving;
    document.getElementById("").value = crashesData.killed_walking;
    document.getElementById("").value = crashesData.killed_freight;
    document.getElementById("").value = crashesData.killed_biking;

    document.getElementById("").value = crashesData.crashCount;
    document.getElementById("").value = crashesData.crashCountD;
    document.getElementById("").value = crashesData.crashCountW;
    document.getElementById("").value = crashesData.crashCountF;
    document.getElementById("").value = crashesData.crashCountB;*/
    //document.getElementById("pm18DrivingText").innerHTML = pm18data.dtot;
    //  document.getElementById("pm18DrivingText").innerHTML = pm18data.dtot;

    console.log(crashesData);
}

//filters possible points, this will help eliminate excess of points
function filterBridges(circlesCordinates) {
    let php_handler = "../../docs/js/map_resources/map_handler.php";

    let key = 'form_bridges';
    data_for_php = {
        key: key
    };
    let shape = "shape";
    let filter_bridges = [];

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
        console.log(data);

        for (index in data.shape_arr) {
            holder = [];
            //gets info per iteration
            let cond = data.shape_arr[index]['cat10___br'];
            let deckA = parseInt(data.shape_arr[index]['cat29___de']);
            let ogrID = data.shape_arr[index]['OGR_FID'];

            holder.push(wktFormatterPoint(data.shape_arr[index][shape]));
            holder = holder[0][0]; // Fixes BLOBs

            //store info on point
            let pointC = {
                lat: parseFloat(holder[0].lat),
                lng: parseFloat(holder[0].lng),
                ogrID: ogrID,
                cond: cond,
                deckArea: deckA

            };
            //filter
            if (insideRange(pointA, pointB, pointC)) {
                filter_bridges.push(pointC);
            }
        }
        console.log(filter_bridges);
        bridges(circlesCordinates, filter_bridges);
    });
}
function bridges(circlesCordinates, filterBridges) {
    //holds all info displayed on statistics
    console.log('inside bridges');
    var nonRepeatedPoints = [];
    let image = "../../docs/images/small_blue_pin.png";
    for (j in circlesCordinates[0]) {
        for (index in filterBridges) { // Organize information into dictionaries
            if (isInsideCircle(filterBridges[index].lng, filterBridges[index].lat, circlesCordinates[0][j][1], circlesCordinates[0][j][0], 0.004254)) {
                if (hasItbeenSeen(filterBridges[index].ogrID, nonRepeatedPoints) == false) {
                    nonRepeatedPoints.push(filterBridges[index]);
            
                    let cond = filterBridges[index]['cond'];
                    let deckA = filterBridges[index]['deckArea'];

                    if(cond == "Good"){
                        image = "../../docs/images/greenPin.png";
                        bridgeData.deckArea_good += deckA;
                        bridgeData.good++;
                    }else if(cond == "Fair"){
                        image = "../../docs/images/yellowPin.png";
                        bridgeData.deckArea_fair += deckA;
                        bridgeData.fair++;
                    }else if(cond == "Poor"){
                        bridgeData.deckArea_poor += deckA;
                        image = "../../docs/images/redPin.png";
                        bridgeData.poor++;
                    }

                    let point = new google.maps.Marker({
                        position: filterBridges[index],
                        title: "Condition: " + cond + " \nDeck Area (sq. ft.): " + deckA,
                        icon: image
                    });

                    point.setMap(map);
                    points.push(point);
          
                }

            }
        }

    }
    document.getElementById("good_deck_area").value = bridgeData.deckArea_good;
    document.getElementById("good_bridge").value = bridgeData.good;
    document.getElementById("fair_deck_area").value = bridgeData.deckArea_fair;
    document.getElementById("fair_bridge").value = bridgeData.fair;
    document.getElementById("poor_deck_area").value = bridgeData.deckArea_poor;
    document.getElementById("poor_bridge").value = bridgeData.poor;
    //console.log(nonRepeatedPoints);
    /*
    document.getElementById("").value = crashesData.classA;
    document.getElementById("").value = crashesData.classB;
    document.getElementById("").value = crashesData.classC;
    document.getElementById("").value = crashesData.injured_driving;
    document.getElementById("").value = crashesData.injured_walking;
    document.getElementById("").value = crashesData.injured_freight;
    document.getElementById("").value = crashesData.injured_biking;
    document.getElementById("").value = crashesData.killed;
    document.getElementById("").value = crashesData.killed_Driving;
    document.getElementById("").value = crashesData.killed_walking;
    document.getElementById("").value = crashesData.killed_freight;
    document.getElementById("").value = crashesData.killed_biking;

    document.getElementById("").value = crashesData.crashCount;
    document.getElementById("").value = crashesData.crashCountD;
    document.getElementById("").value = crashesData.crashCountW;
    document.getElementById("").value = crashesData.crashCountF;
    document.getElementById("").value = crashesData.crashCountB;*/
    //document.getElementById("pm18DrivingText").innerHTML = pm18data.dtot;
    //  document.getElementById("pm18DrivingText").innerHTML = pm18data.dtot;

    console.log(bridgeData);
}
//checks if given point belongs to given circle
function isInsideCircle(x, y, circlex, circley, r) {
    var dist = (x - circlex) * (x - circlex) + (y - circley) * (y - circley);
    r *= r;
    if (dist < r) return true;
    return false;
}
