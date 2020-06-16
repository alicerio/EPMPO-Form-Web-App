let counterCORD = 0;
var poly;
var map;
var paths = {
    lat:[],
    lng:[]
};

// Initialize and add the map
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), { // callback
        zoom: 11,
        disableDoubleClickZoom: true,
        center: new google.maps.LatLng(31.837465, -106.2851078)
    });
    poly = new google.maps.Polyline({
        strokeColor: 'blue',
        strokeOpacity: 1.0,
        strokeWeight: 3
    });
    poly.setMap(map);
    // Add a listener for the click event
    map.addListener('dblclick', addLatLng);

}

// Handles click events on a map, and adds a new point to the Polyline.
function addLatLng(event) {
    var path = poly.getPath();
    // Because path is an MVCArray, we can simply append a new coordinate
    path.push(event.latLng);

    paths.lat.push(event.latLng.lat());
    paths.lng.push(event.latLng.lng());

    var marker = new google.maps.Marker({
        position: event.latLng,
        title: '#' + path.getLength(),
        map: map
    });
}
//get coordinates between the points
function generateCoordinates(point1,point2, circlesOnLines){
    counterCORD ++;
    let diffLan = difference(point1.lat, point2.lat)/circlesOnLines;
    let diffLot = difference(point1.lng, point2.lng)/circlesOnLines; 

    console.log(diffLan + " " + diffLot);
 
    const to_visualize = { lat:parseFloat(point1.lat), lng:parseFloat(point1.lng) };
    var genCord = [];

    for(let i = 0; i < circlesOnLines; i++){
        to_visualize.lat += diffLan;
        to_visualize.lng += diffLot;
        genCord.push(Object.values(to_visualize));
        /*
         var cityCircle = new google.maps.Circle({
            strokeColor: 'red',
            strokeOpacity: 0.01,
            strokeWeight: 2,
            fillColor: 'green',
            fillOpacity: 0.35,
            map: map,
            center: to_visualize,
            radius: 50
        });
        */
        
    }
    console.log(genCord);

    return genCord;
}
//helper method
function difference(num1, num2){
    return num2 - num1;
}
function pointInTheMiddle(point1,point2){
    let to_visualize = {lat:0,lng:0};
    to_visualize.lng = (point1.lng + point2.lng) / 2; 
    to_visualize.lat = (point1.lat + point2.lat) / 2; 

    //debugging purposes
    var marker = new google.maps.Marker({
        position: to_visualize,
        map: map
    });
    return to_visualize;
}

// Function that will iterate 2 points at a time and draws 2 points per iteration so
// user can click infinite circles and draw
function point_drawer(){    
    let circleCordinates  = [];
    for (let i = 0; i < paths.lat.length; i++) {
        if(i >= 1){
            let point1 = { lat: parseFloat(paths.lat[i]), lng: parseFloat(paths.lng[i]) };
            let point2 = { lat: parseFloat(paths.lat[i-1]), lng: parseFloat(paths.lng[i-1]) };
            circleCordinates.push(generateCoordinates(point1,point2,300));
            filterCrashes(circleCordinates);
            circleCordinates = [];
        }
    }
}

function lineDrawer(){    
    let circleCordinates  = [];
    for (let i = 0; i < paths.lat.length; i++) {
        if(i >= 1){
            let point1 = { lat: parseFloat(paths.lat[i]), lng: parseFloat(paths.lng[i]) };
            let point2 = { lat: parseFloat(paths.lat[i-1]), lng: parseFloat(paths.lng[i-1]) };
            circleCordinates.push(generateCoordinates(point1,point2,300));
           // filterCrashes(circleCordinates)
            drawLines(circleCordinates);
            circleCordinates = [];
        }
    }
}

