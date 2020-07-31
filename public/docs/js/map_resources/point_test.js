/** 
 * Handles point section on map
 *  
 */

function setAll(val, obj) {
    Object.keys(obj).forEach(function (index) {
        obj[index] = val
    });
}

function clearCrashesData() {
    setAll(0, crashesData);
    setAll(0, bridgeData);
    setAll(0, pavementsData);

    //pavements reset
    document.getElementById("good_pavement").value = 0;
    document.getElementById("fair_pavement").value = 0;
    document.getElementById("poor_pavement").value = 0;
    //crashes reset
    document.getElementById("EP_total_crash").value = 0;
    document.getElementById("EP_fatal_crash").value = 0;
    document.getElementById("EP_injury_crash").value = 0;
    document.getElementById("EP_pedestrian_crash").value = 0;
    document.getElementById("DA_total_crash").value = 0;
    document.getElementById("DA_fatal_crash").value = 0;
    document.getElementById("DA_injury_crash").value = 0;
    document.getElementById("DA_pedestrian_crash").value = 0;
    //bridges reset
    document.getElementById("good_bridge").value = 0;
    document.getElementById("good_deck_area").value = 0;
    document.getElementById("fair_bridge").value = 0;
    document.getElementById("fair_deck_area").value = 0;
    document.getElementById("poor_bridge").value = 0;
    document.getElementById("poor_deck_area").value = 0;



}


//checks if point C is inside A and B
function insideRange(pointA, pointB, pointC) {
    if (differencePositive(distance(pointA, pointC) + distance(pointB, pointC), distance(pointA, pointB)) <= 0.0009) {
        // console.log(differencePositive(distance(pointA, pointC) + distance(pointB, pointC), distance(pointA, pointB)) + "\n");
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

    let key = 'crashes';
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
            let crash_year = parseInt(data.shape_arr[index]['crash_year']);
            let crash_seve = data.shape_arr[index]['crash_seve'];
            let ped_bike = data.shape_arr[index]['ped_bike'];
            let ogrID = data.shape_arr[index]['OGR_ID'];
            let pedestrian = data.shape_arr[index]['pedestrian'];
            let pedalcycle = data.shape_arr[index]['pedalcycle'];
            let region = data.shape_arr[index]['region'];

            holder.push(wktFormatterPoint(data.shape_arr[index][shape]));
            holder = holder[0][0]; // Fixes BLOBs

            //store info on point
            let pointC = {
                lat: parseFloat(holder[0].lat),
                lng: parseFloat(holder[0].lng),
                crash_year: crash_year,
                crash_seve: crash_seve,
                ped_bike: ped_bike,
                pedestrian: pedestrian,
                pedalcycle: pedalcycle,
                region: region,
                ogrID: ogrID

            };

            /*********************************************** This code is to print all points on DB for testing purposes 

            let image = "../../docs/images/small_blue_pin.png";
            let toPlot = {
                lat: parseFloat(holder[0].lat),
                lng: parseFloat(holder[0].lng),
            }
            let point = new google.maps.Marker({
                position: toPlot,
                icon: image
            });

            point.setMap(map);
            points.push(point);
            ********************************************************************************/

            //filter
            if (insideRange(pointA, pointB, pointC)) {
                filter_crashes.push(pointC);
            }
        }
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

//draws and stores info
function crashes(circlesCordinates, filterCrashes) {
    //holds all info displayed on statistics
    var nonRepeatedPoints = [];
    let image = "../../docs/images/small_blue_pin.png";
    console.log(filterCrashes);
    for (j in circlesCordinates[0]) {
        for (index in filterCrashes) { // Organize information into dictionaries
            if (isInsideCircle(filterCrashes[index].lng, filterCrashes[index].lat, circlesCordinates[0][j][1], circlesCordinates[0][j][0], 0.004254)) {
                if (hasItbeenSeen(filterCrashes[index].ogrID, nonRepeatedPoints) == false) { // 7/31/2020 This is causing a bug
                    nonRepeatedPoints.push(filterCrashes[index]);
                    // define variables this way so its easier to manipulate
                    let crash_year = parseInt(filterCrashes[index]['crash_year']);
                    let crash_seve = filterCrashes[index]['crash_seve'];
                    let ped_bike = parseInt(filterCrashes[index]['ped_bike']);
                    let pedestrian = filterCrashes[index]['pedestrian'];
                    let pedalcycle = filterCrashes[index]['pedalcycle'];
                    let region = filterCrashes[index]['region'];

                    let isFatal = "No";
                    let isSerious = "No";
                    let isPedBike = "No";


                    if (region == "TX") {
                        crashesData.total_crashes_tx++;
                        if (crash_seve == "K - KILLED") {
                            isFatal = "Yes";
                            crashesData.fatal_crashes_tx++;
                        } else if (crash_seve == "A - SUSPECTED SERIOUS INJURY") {
                            isSerious = "Yes";
                            crashesData.serious_injury_crashes_tx++;
                        }
                        if (ped_bike == 1) {
                            isPedBike = "Yes";
                            crashesData.ped_bike_crashes_tx++;
                        }

                    } else if (region == "NM") {
                        crashesData.total_crashes_nm++;
                        if (crash_seve == "Fatal Crash") {
                            isFatal = "Yes";
                            crashesData.total_crashes_nm++;
                        } else if (crash_seve == "Injury Crash") {
                            isSerious = "Yes";
                            crashesData.serious_injury_crashes_nm++;
                        }
                        if (pedestrian == 1) {
                            isPedBike = "Yes";
                            crashesData.ped_bike_crashes_nm++;
                        }
                        if (pedalcycle == 1) {
                            isPedBike = "Yes";
                            crashesData.ped_bike_crashes_nm++;
                        }

                    }

                    if (isPedBike == "Yes") {
                        image = "../../docs/images/ped.png";
                        if (pedestrian == "Involved") {
                            image = "../../docs/images/ped.png";
                        } else if (pedalcycle == "Involved") {
                            image = "../../docs/images/cyclist.png";
                        }
                    } else {
                        image = "../../docs/images/crash.png";
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
    console.log(crashesData);
    document.getElementById("EP_total_crash").value = crashesData.total_crashes_tx;
    document.getElementById("EP_fatal_crash").value = crashesData.fatal_crashes_tx;
    document.getElementById("EP_injury_crash").value = crashesData.serious_injury_crashes_tx;
    document.getElementById("EP_pedestrian_crash").value = crashesData.ped_bike_crashes_tx;

    document.getElementById("DA_total_crash").value = crashesData.total_crashes_nm;
    document.getElementById("DA_fatal_crash").value = crashesData.fatal_crashes_nm;
    document.getElementById("DA_injury_crash").value = crashesData.serious_injury_crashes_nm;
    document.getElementById("DA_pedestrian_crash").value = crashesData.ped_bike_crashes_nm;

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
        bridges(circlesCordinates, filter_bridges);
    });
}

function bridges(circlesCordinates, filterBridges) {
    //holds all info displayed on statistics
    var nonRepeatedPoints = [];
    let image = "../../docs/images/small_blue_pin.png";
    for (j in circlesCordinates[0]) {
        for (index in filterBridges) { // Organize information into dictionaries
            if (isInsideCircle(filterBridges[index].lng, filterBridges[index].lat, circlesCordinates[0][j][1], circlesCordinates[0][j][0], 0.004254)) {
                if (hasItbeenSeen(filterBridges[index].ogrID, nonRepeatedPoints) == false) { // 7/31/2020 This is causing a bug
                    nonRepeatedPoints.push(filterBridges[index]);

                    let cond = filterBridges[index]['cond'];
                    let deckA = filterBridges[index]['deckArea'];

                    if (cond == "Good") {
                        image = "../../docs/images/greenPin.png";
                        bridgeData.deckArea_good += deckA;
                        bridgeData.good++;
                    } else if (cond == "Fair") {
                        image = "../../docs/images/yellowPin.png";
                        bridgeData.deckArea_fair += deckA;
                        bridgeData.fair++;
                    } else if (cond == "Poor") {
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
}
//checks if given point belongs to given circle
function isInsideCircle(x, y, circlex, circley, r) {
    var dist = (x - circlex) * (x - circlex) + (y - circley) * (y - circley);
    r *= r;
    if (dist < r) return true;
    return false;
}
