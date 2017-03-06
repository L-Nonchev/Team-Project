<?php
				//-=-=-=-=-=-=---==-=-=-=Data insert=-=-=-==-=-==-=-==--\\
				
$email = htmlentities($_POST['email']);
$password = htmlentities($_POST['pasword']);

				//-=-=-=-=-=-=---==-=-=-=END of Data insert=-=-=-==-=-==-=-==--\\

	//-=-=-=-=-=-=---==--=-=-=---==-=-=-=LogIn validation=-=-=-==--=-=-=---==-=-==-=-==--\\
				
				//-=-=-=-=-=-=---==-=-=-=Database formating=-=-=-==-=-==-=-==--\\
				
$usersRaw = file('../logIn-data/logInData.txt');
$usersData = array();

foreach ($usersRaw as $info){
	$info = str_replace("-", "", $info);
	$info = trim($info);
	$userEmail = substr($info, 0, 39);
	$userPassword = substr($info, -40);
	$usersData[$userEmail] = $userPassword;
}
				//-=-=-=-=-=-=---==-=-=-=END of Database formating=-=-=-==-=-==-=-==--\\


foreach ($users as $userEmail => $userPassword){
	
	if (md5($email) === $userEmail && md5($password) === $userPassword){
		header('Location: about.php', true, 200);
		
		// creat cookie for client acces
		$cookie_name = "logged-in";
		$cookie_value  = $userEmail;
		$cookie_exp = time()+60*60; // login time 1hour
		// create cookie
		setcookie($cookie_name, $cookie_value , $cookie_exp , "/");
		
	}
	
}







?>