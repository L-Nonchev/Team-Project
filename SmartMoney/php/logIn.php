<?php

if (isset($_POST['log-in-button'])){
				//-=-=-=-=-=-=---==-=-=-=Data insert=-=-=-==-=-==-=-==--\\
	$email = htmlentities($_POST['email']);
	$password = htmlentities($_POST['password']);
	
	// hash data insert
	$email = sha1($email);
	$passwordMd5 = md5($password);
	$password = sha1($passwordMd5);
					//-=-=-=-=-=-=---==-=-=-=END of Data insert=-=-=-==-=-==-=-==--\\
	
		//-=-=-=-=-=-=---==--=-=-=---==-=-=-=LogIn validation=-=-=-==--=-=-=---==-=-==-=-==--\\
					
					//-=-=-=-=-=-=---==-=-=-=Database formating=-=-=-==-=-==-=-==--\\
					
	$usersRaw = file('../logIn-data/logInData.txt');
	$usersData = array();
	
	foreach ($usersRaw as $info){
		$info = trim($info);
		$userEmail = substr($info, 0, 40);
		$userPassword = substr($info, -40);
		$usersData[$userEmail] = $userPassword;
	}

					//-=-=-=-=-=-=---==-=-=-=END of Database formating=-=-=-==-=-==-=-==--\\
	foreach ($usersData as $userEmail => $userPassword){
		if ($email === $userEmail && $password === $userPassword){

			//-=-=-=-=-=-=---==-=-=-= Cookies =-=-=-==-=-==-=-==--\\
			// creat cookie for client acces
			$cookie_name = "logged-in";
			$cookie_value  = $email;
			$cookie_exp = time() + 3600; // login time 1hour
			// create cookie
			setcookie($cookie_name, $cookie_value , $cookie_exp , "/");
		
			//-=-=-=-=-=-=---==-=-=-= Redirect =-=-=-==-=-==-=-==--\\
			echo "da";
			header('Location: ../index.php', true, 303);
			die();
			
		}else {
			header('Location: ../invalidLogin.php', true, 303);
			die();
		}
		
	}

}else {
	header('Location: ../invalidLogin.php', true, 303);
	die();
}

?>