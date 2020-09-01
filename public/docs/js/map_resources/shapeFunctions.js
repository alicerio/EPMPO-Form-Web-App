 function wktFormatter(poly) {
     let name = poly.slice(0, 7);
     let shape_s = [];
     if (name == "MULTIPO") { // Multipolygon parser
         let new_poly = poly.slice(15, -3);
         new_poly = new_poly.split(")),((");
         let len = new_poly.length;
         for (var j = 0; j < len; j++) {
             let polyCoordi = [];
             let polyTemp = new_poly[j].split(",");
             for (i = 0; i < polyTemp.length; i++) {
                 let temp = polyTemp[i].split(" ");
                 polyCoordi.push({
                     lat: parseFloat(temp[1]),
                     lng: parseFloat(temp[0])
                 });
             }
             shape_s[j] = polyCoordi;
         }
     } else { // Polygon parser
         let new_poly = poly.slice(9, -2);
         new_poly = new_poly.split("),(");
         let len = new_poly.length;
         for (var j = 0; j < len; j++) {
             let polyCoordi = [];
             let polyTemp = new_poly[j].split(",");
             for (i = 0; i < polyTemp.length; i++) {
                 let temp = polyTemp[i].split(" ");
                 polyCoordi.push({
                     lat: parseFloat(temp[1]),
                     lng: parseFloat(temp[0])
                 });
             }
             shape_s[j] = polyCoordi;
         }
     }
     return shape_s;
 }
 
 /**
  * Formats the points.
  */
 function wktFormatterPoint(point) {
     let shape_s = [];
     let new_point = point.slice(6, -2);
     new_point = new_point.split("),(");
     let len = new_point.length;
     for (var j = 0; j < len; j++) {
         let pointCoordi = [];
         let pointTemp = new_point[j].split(",");
         for (i = 0; i < pointTemp.length; i++) {
             let temp = pointTemp[i].split(" ");
             pointCoordi.push({
                 lat: parseFloat(temp[1]),
                 lng: parseFloat(temp[0])
             });
         }
         shape_s[j] = pointCoordi;
     }
     return shape_s;
 }

 // adds a hover effect on polygons(google api has not provided functionality for it)
 function injectTooltip(event, data) {
     if (!tipObj && event) {
         //create the tooltip object
         tipObj = document.createElement("div");
         tipObj.style.width = 'auto';
         tipObj.style.height = '40px';
         tipObj.style.backgroundColor = "white";
         tipObj.style.borderRadius = "5px";
         tipObj.style.padding = "10px";
         tipObj.style.fontFamily = "Arial,Helvetica";
         tipObj.style.textAlign = "center";
         tipObj.innerHTML = data;
 
         //fix for the version issue
         eventPropNames = Object.keys(event);
         if (!coordPropName) {
             //discover the name of the prop with MouseEvent
             for (var i in eventPropNames) {
                 var name = eventPropNames[i];
                 if (event[name] instanceof MouseEvent) {
                     coordPropName = name;
                     break;
                 }
             }
         }
 
         if (coordPropName) {
            //position it
            tipObj.style.position = "fixed";
            tipObj.style.top = event[coordPropName].clientY + window.scrollY + offset.y + "px";
            tipObj.style.left = event[coordPropName].clientX + window.scrollX + offset.x + "px";
 
            //add it to the body
            document.body.appendChild(tipObj);
         }
     }
 }
 
 // continues hover effect while moving within the polygon
 function moveTooltip(event) {
     if (tipObj && event && coordPropName) {
        //position it
        tipObj.style.top = event[coordPropName].clientY + window.scrollY + offset.y + "px";
        tipObj.style.left = event[coordPropName].clientX + window.scrollX + offset.x + "px";
     }
 }
 
 // removes hover effect when exiting polygon
 function deleteTooltip(event) {
     if (tipObj) {
        //delete the tooltip if it exists in the DOM
        document.body.removeChild(tipObj);
        tipObj = null;
     }
 }

 //adds commas to numbers
 function commafy(num) {
    var str = num.toString().split('.');
    if (str[0].length >= 4) {
        str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
    }
    if (str[1] && str[1].length >= 4) {
        str[1] = str[1].replace(/(\d{3})/g, '$1 ');
    }
    return str.join('.');
 }
 