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
			};
			
			return $dataOutput;
			
		} else {
			return false;
		}
		;
	} catch ( PDOException $e ) {
		$errorType = $e->errorInfo . "<br />";
		$errorMessage = $e->getMessage ();
		mail ( 'jasensolid@gmail.com', $errorType, $errorMessage );
		return header ( 'Location: ./404.html' );
	}
}
;

// -=-==-=--=-=-=-=-=-=--=-==--==-=END of DB User info Request function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\


// -=-==-=--=-=-=-=-=-=--=-==--==-= DB User expense Insert function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\
function db_insert_expense($sum, $type_id, $user_id) {
	
	$sum = htmlentities($sum);
	$type_id = htmlentities($type_id);
	$user_id = htmlentities($user_id);
	
	try {
		$dbcon = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
		$dbcon->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
		$execute = $dbcon->prepare ( "INSERT INTO accounts ( user_id, sum, type_id, date)
 									VALUES(?,?,?, NOW()) ");
			
		if ($execute->execute(array( $user_id, $sum, $type_id ))) {			
						
			return true;				
			
		}else {
			
			return false;
			
		};		
		
	} catch ( PDOException $e ) {
		$errorType = $e->errorInfo . "<br />";
		$errorMessage = $e->getMessage ();
		mail ( 'jasensolid@gmail.com', $errorType, $errorMessage );
		return header ( 'Location: ./404.html' );
	}
};
// -=-==-=--=-=-=-=-=-=--=-==--==-= END of DB User expense Insert function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= DB Expense type insert function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\
function db_insert_type_of_expense($type_name, $type_of_spend) {
	
	$type_name = htmlentities($type_name);
	$type_of_spend = htmlentities($type_of_spend);
	
	try {
		$dbcon = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
		$dbcon->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
		$execute = $dbcon->prepare ( "INSERT INTO type_accounts ( type_name, type)
 									VALUES(?,?) ");
		
		if ($execute->execute(array( $type_name, $type_of_spend ))) {
			
			$result = true;
			echo $result;
			
		}else {
			
			$result = false;
			echo $result;
			
		};
		
		
		
	} catch ( PDOException $e ) {
		$errorType = $e->errorInfo . "<br />";
		$errorMessage = $e->getMessage ();
		mail ( 'jasensolid@gmail.com', $errorType, $errorMessage );
		return header ( 'Location: ./404.html' );
	}
};




// -=-==-=--=-=-=-=-=-=--=-==--==-=END of  DB Spend type insert function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\



// -=-==-=--=-=-=-=-=-=--=-==--==-= DB Spend type check function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function db_expense_name_check($type_name, $type_of_spend) {
	
	$type_name = htmlentities($type_name);
	$type_of_spend = htmlentities($type_of_spend);
	
	try {
		$dbcon = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
		$dbcon->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
		$check = $dbcon->prepare ( "SELECT EXISTS (SELECT type_id FROM type_accounts WHERE type_name = ? ) AS 'Result check'" );
		
		if ($check->execute(array($type_name))) {
			
			if (($result = $check->fetchColumn()) == 1) {
				
				$type_id= $dbcon->prepare ( "SELECT type_id FROM type_accounts WHERE type_name = ?" );
				$type_id->execute(array($type_name));
				$type_id = $type_id->fetchColumn();
				
				echo "Id-to na razhoda e: ". $type_id;
				
			}elseif (($result = $check->fetchColumn()) == 0){
				
			}
			
			
		}else {
			
			$result = false;
			echo $result;
			
		};
		
		
		
	} catch ( PDOException $e ) {
		$errorType = $e->errorInfo . "<br />";
		$errorMessage = $e->getMessage ();
		mail ( 'jasensolid@gmail.com', $errorType, $errorMessage );
		return header ( 'Location: ./404.html' );
	}
};

// -=-==-=--=-=-=-=-=-=--=-==--==-= END of DB Spend type check function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

db_type_check('salary')
?>