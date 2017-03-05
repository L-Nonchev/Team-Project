<?php 

if (isset($_POST['sing-up-button'])){
	$firstName = htmlentities($_POST['first-name']);
	$lastName = htmlentities($_POST['last-name']);
	$email = htmlentities($_POST['email']);
	$password1 = htmlentities($_POST['pasword']);
	$password2 = htmlentities($_POST['repeat-pasword']);
	
	if (strlen($firstName) > 0 && strlen($lastName) > 0 && strlen($email) > 0 && strlen($password1) > 0 && strlen($password2) > 0){
		//hash data
			//hash email 
			$mailSha1 = sha1($email);
		
			// hash passwords
			$passMd5 = md5($password1);
			$paddSha1 = sha1($passMd5);
		
		
		// check to exist incoming input data
		$allData = "";
		$handle = fopen('logIn-data/loginData.txt', 'r');
		while (!feof($handle)){
			$line = fgets($handle);
			$allData = $allData . $line;
		}
		//check to existing username
		if (substr_count($allData, $mailSha1) > 0){
			fclose($handle);
			header('Location: MailExist.html');
			die();
		} else {
			// check for corec pass
			if ($password1 !== $password2){
				// trqbva da vidq kak da go prepratq kym index.php syobshtenie
				
			} else {
				// creat folder for Client
				mkdir('./users/'. $mailSha1 );
				mkdir('./users/'.$mailSha1.'/assets');
				mkdir('./users/'.$mailSha1.'/assets/profilPic');
				$data = $firstName . "-" . $lastName . "-" . PHP_EOL . 
						"income-0-" . PHP_EOL .
						"spend-0-" . PHP_EOL .
						"saved-0-". PHP_EOL;		
				file_put_contents('./users/'.$mailSha1.'/usersData.txt', $data);
				
				//Cookies
				// creat cookie for client acces
				$cookie_name = "logged-in";
				$cookie_value  = $mailSha1;
				$cookie_exp = time() + 3600; // login time 1hour
				// create cookie
				setcookie($cookie_name, $cookie_value , $cookie_exp , "/");
				
				//Creat acount
				// create a data for new User and Password
				$newACC = $mailSha1."-".$paddSha1."-";
				file_put_contents('logIn-data/loginData.txt', $newACC . PHP_EOL, FILE_APPEND);
				fclose($handle);
				header('Location: index.php', true, 303);
				die();
			}
			// End creat account
		}
		fclose($handle);
		
	} else {
		$sigUpErr = " Please fill all fields!";
		
		header('Location: index.php', true, 302);
	}
}else {
	$firstName = '';
	$lastName = '';
	$email = '';
	$password1 = '';
	$password2 = '';
}

?>