<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	// JSON request
	$data = array();
	parse_str(file_get_contents("php://input"), $data);
	$email = json_decode($data['data'], true);

	// hash email 
	$mailSha1 = sha1($email['mail']);
	
	$allData = "";
	$handle = fopen('../logIn-data/loginData.txt', 'r');
	while (!feof($handle)){
		$line = fgets($handle);
		$allData = $allData . $line;
	}
	
	//check to existing e-mail
	if (substr_count($allData, $mailSha1) > 0){
		$results = array(
			"haveMail" => true,
			"mail" => $email['mail']
		);
	} else {
		$results = array(
			"haveMail" => false,
			"mail" => $email['mail'],
		);
	}
	// return JSON response
	echo json_encode($results);

}

?>