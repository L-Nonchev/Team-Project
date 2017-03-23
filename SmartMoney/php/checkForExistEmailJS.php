<?php
// this script is used from JS "singup-validation.js"
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	// JSON request
	$data = array();
	parse_str(file_get_contents("php://input"), $data);
	$email = json_decode($data['data'], true);

	// hash email 
	$mailSha1 = sha1($email['mail']);
	
	// define data for login DB
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'smartmoney');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	
	try{
			// Create connection
			$db = new PDO("mysql:host=". DB_HOST . "; dbname=". DB_NAME, DB_USER, DB_PASS);
		
			// Set the PDO error mode to exception
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			//select data for exist e-mail
			$selectEmail = "SELECT user_email
			FROM users
			WHERE user_email = '$mailSha1'; ";
			$result = $db->query($selectEmail)->fetch(PDO::FETCH_COLUMN);
			if($result === $mailSha1){
				$results = array(
						"haveMail" => true,
						"mail" => $email['mail']
				);
			}else {
				$results = array(
						"haveMail" => false,
						"mail" => $email['mail']
				);
			}
			
			// return JSON response
			echo json_encode($results);
			
	} catch(PDOException $error){
		die("ERROR: " . $error->getMessage());
	}
	// Close connection
	unset($db);
}

?>