<?php
	// Headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	   ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	include_once './config/Database.php';
	include_once './classes/WA_Hunter.php';

	// Instantiate DB and connect
	$database = new Database();
	$db = $database->connect();
	//New instance of the class
	$wah = new WA_Hunter($db);

	include_once 'admin_auth.php';
     // Logs
    // ini_set('display_errors', 1);
   //   ini_set('display_startup_errors', 1);
   //  error_reporting(E_ALL);
     
	// Query
	$result = $wah->get_all();


	// Get rows count
	$num = count($result);
 //echo $num;
	// Check if anny posts
	if($num > 0) {

	    // Change to JSON
	    echo json_encode(['records' => $result]);
	    //http_response_code(200);

	} else {
	    //http_response_code(404);
	    echo json_encode(['message' => 'No Records Found.']);
	}