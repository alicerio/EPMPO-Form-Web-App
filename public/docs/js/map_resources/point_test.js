/** 
 * Handles point section on map
 *  
 */

var crashesData = {
    classA: 0, //Serious Injuries
    classB: 0, //Non-Incapacitating Injuries
    classC: 0, //Possible Injuries
    classO: 0,
    non_injuri: 0,
    unknown_injuri: 0,
    killed:0,
    injured: 0,
    injured_driving: 0,
    injured_walking: 0,
    injured_freight: 0,
    injured_biking: 0,
    killed_Driving: 0,
    killed_walking:0 ,
    killed_freight:0,
    killed_biking:0,
    //count of crashes
    crashCount: 0,
    crashCountD: 0,
    crashCountW: 0,
    crashCountF: 0,
    crashCountB: 0,
    //totals
    dtot: 0,
    ftot: 0,
    wtot: 0,
    btot: 0,
}
function setAll(val) {
    Object.keys(crashesData).forEach(function(index) {
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
                ogrID:ogrID,
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

function hasItbeenSeen(currentPoint, nonRepeatedPoints){
    return (nonRepeatedPoints).some(function(nonRepeatedPointsVal) {
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
                if(hasItbeenSeen(filterCrashes[index].ogrID, nonRepeatedPoints) == false){
                    nonRepeatedPoints.push(filterCrashes[index]);
                    // define variables this way so its easier to manipulate
                    //console.log(filterCrashes[index]['ogrID']);
                    let type = filterCrashes[index]['type'];
                    let location = filterCrashes[index]['statefp'];
                    let crash_year = parseInt(filterCrashes[index]['crash_year']);
                    let killed = parseInt(filterCrashes[index]['killed']);
                    let non_injuri = parseInt(filterCrashes[index]['non_injuri']);
                    let unknown_injuri = parseInt(filterCrashes[index]['unknown_injuri']);
                    let classA = parseInt(filterCrashes[index]['classA']);
                    let classB = parseInt(filterCrashes[index]['classB']);
                    let classC = parseInt(filterCrashes[index]['classC']);
                    let classO = parseInt(filterCrashes[index]['classO']);

         
                    crashesData.classA += classA;
                    crashesData.classB += classB;
                    crashesData.classC += classC;
                    crashesData.classO += classO;
                    crashesData.non_injuri += non_injuri;
                    crashesData.unknown_injuri += unknown_injuri;
                    crashesData.killed += killed;

                    //filter by type
                    crashesData.crashCount++; 
                    crashesData.injured += classA;
                    if (type == "Pedestrian" || type == "PED") {
                        image = "../../docs/images/ped.png";
                        crashesData.crashCountW++;
                        crashesData.injured_walking += classA;
                        crashesData.killed_walking += killed;
                    } else if (type == "Commerical_Vehicles" || type == "COMV") {
                        image = "../../docs/images/truck.png";
                        crashesData.crashCountF++;
                        crashesData.injured_freight += classA;
                        crashesData.killed_freight += killed;
                    } else if (type == "GEN") {
                        image = "../../docs/images/crash.png";
                        crashesData.crashCountD++;
                        crashesData.injured_driving += classA;
                        crashesData.killed_Driving += killed;
                    } else if (type == "Pedcyclists" || type == "BIKE") {
                        image = "../../docs/images/cyclist.png";
                        crashesData.crashCountB++;
                        crashesData.injured_biking += classA;
                        crashesData.killed_biking += killed; 
                    } else if (type == "BIKE_COMV") {
                        image = "../../docs/images/cyclist.png";
                        crashesData.crashCountB++;
                        crashesData.crashCountW++;
                        crashesData.injured_biking += classA;
                        crashesData.injured_freight += classA;
                        crashesData.killed_biking += killed; 
                        crashesData.killed_freight += killed; 
                        
                    } else if (type == "PED_COMV") {
                        image = "../../docs/images/ped.png";
                        crashesData.crashCountF++;
                        crashesData.crashCountW++;
                        crashesData.injured_walking += classA;
                        crashesData.injured_freight += classA;
                        crashesData.killed_walking += killed; 
                        crashesData.killed_freight += killed; 
                    }
    
                    let point = new google.maps.Marker({
                        position: filterCrashes[index],
                        title: "Year: " + crash_year + " \nSerious Injuries " + classA + 
                        " \nNon-Incapacitating Injuries: " + classB + "\nPossible Injuries: " +
                         classC + "\nNon-Injury: " + non_injuri + "\nkilled: " + killed,
                        icon: image
                    });

                 
                    point.setMap(map);
                    points.push(point);
                }
              
            }
        }
        
    }
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


//checks if given point belongs to given circle
function isInsideCircle(x, y, circlex, circley, r) {
    var dist = (x - circlex) * (x - circlex) + (y - circley) * (y - circley);
    r *= r;
    if (dist < r) return true;
    return false;
}
