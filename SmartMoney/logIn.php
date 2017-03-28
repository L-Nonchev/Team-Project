<?php
require './db_connection.php';

function wrongLogin (){
	header('Location: ./invalidLogin.php', true, 303);
	die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['log-in-button'])){
		if (isset($_POST['email']) && isset($_POST['password'])){
			if (strlen($_POST['password']) > 7){
				//-=-=-=-=-=-=---==-=-=-=Data insert=-=-=-==-=-==-=-==--\\
				$email = htmlentities($_POST['email']);
				$password = htmlentities($_POST['password']);
	
				//-=-=-=-=-=-=---==-=-=-=END of Data insert=-=-=-==-=-==-=-==--\\
	
			
			//-=-=-=-=-=-=---==-=-=-= Redirect =-=-=-==-=-==-=-==--\\
			if (logInUser($email, $password)){
				
				header('Location: ./index.php', true, 303);
				die();
			
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
}else{
		wrongLogin();
}


?>