<?php

function wrongLogin (){
	header('Location: ../invalidLogin.php', true, 303);
	die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['log-in-button'])){
		if (isset($_POST['email']) && isset($_POST['password'])){
			if (strlen($_POST['password']) > 7){
				//-=-=-=-=-=-=---==-=-=-=Data insert=-=-=-==-=-==-=-==--\\
				$email = htmlentities($_POST['email']);
				$password = htmlentities($_POST['password']);
					
				// hash data insert
				$mailSha1 = sha1($email);
				$passwordMd5 = md5($password);
				$password = sha1($passwordMd5);
					
				// define data for login DB
				define('DB_HOST', 'localhost');
				define('DB_NAME', 'smartmoney');
				define('DB_USER', 'root');
				define('DB_PASS', '');
				//-=-=-=-=-=-=---==-=-=-=END of Data insert=-=-=-==-=-==-=-==--\\
					
		//-=-=-=-=-=-=---==--=-=-=---==-=-=-=LogIn validation=-=-=-==--=-=-=---==-=-==-=-==--\\
	
				//-=-=-=-=-=-=---==-=-=-= Select to Database =-=-=-==-=-==-=-==--\\
				try{
					// Create connection
					$db = new PDO("mysql:host=". DB_HOST . "; dbname=". DB_NAME, DB_USER, DB_PASS);
						
					// Set the PDO error mode to exception
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
					//select data for exist e-mail
					$selectEmail = "SELECT user_email
									FROM users
									WHERE user_email = '$mailSha1'; ";
					$resultEmail = $db->query($selectEmail)->fetch(PDO::FETCH_COLUMN);
					
					$selectPassword = "SELECT user_password
										FROM users
										WHERE user_email = '$mailSha1'; ";
					$resultPassword = $db->query($selectPassword)->fetch(PDO::FETCH_COLUMN);
		
					if (($resultPassword === $password ) && ($resultEmail === $mailSha1)){
	
						//-=-=-=-=-=-=---==-=-=-=  SESSION =-=-=-==-=-==-=-==--\\
						session_start();
							
						$selectUser_Id  = "SELECT user_id
									  	   FROM users
									 	   WHERE user_email = '$mailSha1';";
						$userID = $db->query($selectUser_Id)->fetch(PDO::FETCH_COLUMN);
						
						$selectUserName=  "SELECT user_name
									   	  FROM users
										  WHERE user_email = '$mailSha1';";
						$userName = $db->query($selectUserName)->fetch(PDO::FETCH_COLUMN);
						
						$_SESSION['user_id'] = $userID;
						$_SESSION['user_name'] = $userName;
						
						
						
						//-=-=-=-=-=-=---==-=-=-= Redirect =-=-=-==-=-==-=-==--\\
						//ACCESS
						
						// Close connection
						unset($db);
						
						header('Location: ../index.php', true, 303);
						die();
					}else {
						//FAIL
						
						// Close connection
						unset($db);
						
						wrongLogin();
					}
				
				} catch(PDOException $error){
					die("ERROR: " . $error->getMessage());
				}
				// Close connection
				unset($db);
					
			}else{
				wrongLogin();
			}
		}else{
			wrongLogin();
		}
	}else{
		wrongLogin();
	}
}else{
	wrongLogin();
}
?>