<?php
	// Headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

	include_once './config/Database.php';
	include_once './classes/WA_Hunter.php';

	// Instantiate DB and connect
	$database = new Database();
	$db = $database->connect();

	//New instance of the class
	$wah = new WA_Hunter($db);

	include_once 'admin_auth.php';

	
	$new_dt_01 = [];

	// Get raw posted data
	$data = json_decode(@file_get_contents("php://input"));

	if (isset($data)) {
		
		//proceed with creation
		$new_dt_01[] = htmlspecialchars(strip_tags($data->UserID));
		$new_dt_01[] = htmlspecialchars(strip_tags($data->name));
		$new_dt_01[] = htmlspecialchars(strip_tags($data->Rank));
		$new_dt_01[] = htmlspecialchars(strip_tags($data->Coins));

		//add new record
		if($new_dt_01){
			$done = $wah->create($new_dt_01);
			if ($done ) {
				echo json_encode(
					        ['message' => 'Record Added!']
					    );
				
			}else{
				echo json_encode(
					        ['message' => 'Record Not Added!']
					    );
				
			}
		}
		

	}else{
		echo json_encode(
		        ['message' => 'Sorry, Invalid Request!']
		    );
				
	}