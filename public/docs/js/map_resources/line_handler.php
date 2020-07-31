<?php

/**
 *initial configuration
 */
require_once("map_connection.php");

/**
*Initialize return variables and fetch request
*/ 
$toReturn = array();								//global array that will return requested data
$shape = array(); 									// for the data that will be returned, shape and value
$AOI_SHAPE = $_GET['AOI'];
$active_pm = $_GET['Table_wanted'];

/**
*Initialize special MySQL variable
*/ 
$query = "SET @poly = ST_GeomFromGeoJSON('$AOI_SHAPE');";
$result = mysqli_query($conn, $query); 

/**
 * Select query to be run in database
 */
if($active_pm =="pavements"){ 
	//$query = "SELECT begin_poin, end_point,through_la,mode,state_code,year_recor,iri, ST_AsText(SHAPE)  as shape FROM $active_pm as p WHERE  ST_INTERSECTS( st_geomfromtext( st_astext(@poly), 3), p.SHAPE );"; 
	$query = "SELECT begin_poin, end_point,through_la,mode,state_code,year_recor,iri, ST_AsText(SHAPE)  as shape FROM $active_pm as p WHERE  ST_INTERSECTS( st_geomfromtext( st_astext(@poly), 3), p.SHAPE );"; 
}
else{
	$query = "SELECT ST_AsText(SHAPE) as shape FROM $active_pm as p WHERE  ST_INTERSECTS( st_geomfromtext( st_astext(@poly), 3), p.SHAPE );";
}

/**
 *Run selected query
*/
$result = mysqli_query($conn, $query); 

/**
 *Save results into indexed Array
 */
while($temporal = mysqli_fetch_assoc($result)){ 
	array_push($shape, $temporal);
}

/**
 *Respond request to Front-end with JSON
 */
$toReturn['shape_arr'] = $shape; 					// store it in an index on our array, by name == more significant
header('Content-Type: application/json'); 			//specifies how the data will return 
echo json_encode($toReturn); 						//encodes our array to json, which lets us manipulate in front-end
$conn->close();
