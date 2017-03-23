<?php
// -=-==-=--=-=-=-=-=-=--=-==--==-= DB Constants=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\
define ( 'DB_USER', 'root' );
define ( 'DB_PASS', '' );
define ( 'DB_HOST', 'localhost' );
define ( 'DB_NAME', 'smartmoney' );

// -=-==-=--=-=-=-=-=-=--=-==--==-= END of DB Constants=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= DB User info Request function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\
function db_request_info($user_id) {
	try {
		$dbcon = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
		$dbcon->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
		$carryer = $dbcon->prepare ( "SELECT a.sum AS Spendage,t.type_name, t.type
									FROM users u INNER JOIN accounts a ON(u.user_id = a.user_id)
									INNER JOIN type_acctounts t ON(a.type_id = t.type_id)
									WHERE u.user_id = ? " );
		if ($carryer->execute ( array ($user_id) )) {
			$dataOutput = array ();
			while ( $row = $carryer->fetch ( PDO::FETCH_ASSOC ) ) {
				$dataOutput [] = $row;
			}
			;
			var_dump ( $dataOutput );
		} else {
			return 'Invalid input!';
		}
		;
	} catch ( PDOException $e ) {
		$errorType = $e->errorInfo . "<br />";
		$errorMessage = $e->getMessage ();
		mail ( 'admin@smoney.com', $errorType, $errorMessage );
		return header ( 'Location: ./404.html' );
	}
}
;

// -=-==-=--=-=-=-=-=-=--=-==--==-=END of DB User info Request function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= DB User info Insert function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\
function db_insert_info($sum, $type, $type_name, $user_id) {
	try {
		$dbcon = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
		$dbcon->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
		$check = $dbcon->prepare ( "SELECT EXISTS (SELECT type_id FROM type_accounts WHERE type_name =  ?)" );
		
		if ($check->execute(array($type_name)) && $check->fetchColumn(0) > 0) {
			$type_id = $check->fetchColumn(0);
// 			$carryer = $dbcon->prepare ( "INSERT INTO accounts ( user_id, sum, type_id, date)									
// 									VALUES(?,?,?, NOW()) ");
// 			$carryer->execute ( array (	$user_id, $sum,  $type_id[0]) );
// 			echo "Sucsess!";		
				var_dump($type_id);
			
		}else {
			echo "nevalidno ime";
		};
		
		
		
	} catch ( PDOException $e ) {
		echo $errorType = $e->errorInfo . "<br />";
		echo $errorMessage = $e->getMessage ();
// 		mail ( 'admin@smoney.com', $errorType, $errorMessage );
// 		return header ( 'Location: ./404.html' );
	}
}

db_insert_info( $sum = 100, null, 'salary', 2 );
?>