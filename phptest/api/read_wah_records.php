<?php
	// Headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../config/Database.php';
	include_once '../classes/WA_Hunter.php';

	// Instantiate DB and connect
	$database = new Database();
	$db = $database->connect();

	//New instance of the class
	$wah = new WA_Hunter($db);

	// Query
	$result = $wah->get_all();


	// Get rows count
	$num = count($result);

	// Check if anny posts
	if($num > 0) {

	    // Change to JSON
	    echo json_encode(['records' => $result]);
	    //http_response_code(200);

	} else {
	    //http_response_code(404);
	    echo json_encode(['message' => 'No Records Found.']);
	}