<?php
	
	include_once '../classes/Admin.php';

	//New instance of the class
	$admin = new Admin($db);

	$access = 0;

	// Get auth parameters
	$req = $_REQUEST;

	if (isset($req)) {
		$uname = htmlspecialchars(strip_tags($req['uname']));
		$pword = htmlspecialchars(strip_tags($req['pword']));

		$pword = $admin->md5_encrypt($pword);

		//for auth
		//get admin details
		$admin_dt = $admin->admin_login([$uname, $pword]);

		
		if (!$admin_dt) {
			 echo json_encode(
		        ['message' => 'Authorization Failed!']
		    );

			exit();
		}



	}
		