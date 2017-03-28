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
	define('DB_NAME', 'smart_money');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	
	try{
		// Create connection
		$dbcon = new PDO("mysql:host=". DB_HOST . "; dbname=". DB_NAME, DB_USER, DB_PASS);
	
		// Set the PDO error mode to exception
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		// check for exist e-mail
		$selectEmail = "SELECT user_id
					FROM users
					WHERE user_email = ?; ";
		
		$check = $dbcon->prepare($selectEmail);
		$check->execute(array($mailSha1));
		if ($check->fetchColumn() > 0) {

			$results = array(
					"haveMail" => true,
					"mail" => $email['mail']);
	}else {
			$results = array(
					"haveMail" => false,
					"mail" => $email['mail']);
		}
		
		echo json_encode($results);

		// Close connection
		unset($dbcon);
		
	} catch ( PDOException $e ) {
		$errorType = $e->errorInfo . "<br />";
		$errorMessage = $e->getMessage ();
		mail ( 'jasensolid@gmail.com', $errorType, $errorMessage );
	}
}


?>