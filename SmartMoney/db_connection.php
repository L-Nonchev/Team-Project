<?php
// -=-==-=--=-=-=-=-=-=--=-==--==-= DB Constants=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\
define ( 'DB_USER', 'root' );
define ( 'DB_PASS', '' );
define ( 'DB_HOST', 'localhost' );
define ( 'DB_NAME', 'smart_money' );

// -=-==-=--=-=-=-=-=-=--=-==--==-= END of DB Constants=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= DB User info Request function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\


function db_request_info($user_id) {
	
	
	
	try {
		$dbcon = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
		$dbcon->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
		$carryer = $dbcon->prepare ( "SELECT ua.transaction_sum, tn.trans_name, tt.trans_type, ua.transaction_date 
										FROM users u INNER JOIN user_account ua ON( u.user_id = ua.user_id)
										INNER JOIN transaction_name tn ON( ua.name_id = tn.name_id)
										INNER JOIN transaction_type tt ON( ua.type_id = tt.type_id)
										WHERE u.user_id = ? " );
		if ($carryer->execute ( array ($user_id) )) {
			$sums_in = array ();
			$sums_out = array();
			$in = 0;
			$out = 0;
			while ( $row = $carryer->fetch ( PDO::FETCH_ASSOC ) ) {				
				
				if ($row['trans_type'] == 'IN') {					
					$sums_in[$in]['sum'] = $row['transaction_sum'];
					$sums_in[$in]['name'] = $row['trans_name'];
					$sums_in[$in]['date'] = $row['transaction_date'];		
					$in++;
					
				}elseif($row['trans_type'] == 'OUT') {					
					$sums_out[$out]['sum'] = $row['transaction_sum'];
					$sums_out[$out]['name'] = $row['trans_name'];
					$sums_out[$out]['date'] = $row['transaction_date'];
					$out++;
				}
			};		
			$user_info = array(
					'IN' => $sums_in,
					'OUT' => $sums_out
			);
			
			return $user_info;
			
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
function db_insert_expense($user_id, $sum, $type_of_expense, $name_of_expense) {
	
	$user_id = htmlentities($user_id);
	$sum = htmlentities($sum);
	$type_of_expense= htmlentities($type_of_expense);
	$name_of_expense= htmlentities($name_of_expense);
	
	
	try {
		$dbcon = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
		$dbcon->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
		$execute = $dbcon->prepare ( "INSERT INTO user_account (user_id, transaction_sum, transaction_date, type_id, name_id )
										VALUES (?, ?, NOW(), ?, ?)");
			
		if ($execute->execute(array( $user_id, $sum, $type_of_expense, $name_of_expense))) {			
						
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

// -=-==-=--=-=-=-=-=-=--=-==--==-= DB   type insert function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\
function db_insert_type_of_expense($type_name) {
	
	$type_name = htmlentities($type_name);
	
	
	try {
		$dbcon = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
		$dbcon->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
		$execute = $dbcon->prepare ( "INSERT INTO transaction_name ( trans_name)
 									VALUES(?) ");
		
		if ($execute->execute(array( $type_name ))) {
			
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

function db_expense_name_check($type_name) {
	
	$type_name = htmlentities($type_name);
	
	
	try {
		$dbcon = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
		$dbcon->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
		$check = $dbcon->prepare ( "SELECT EXISTS (SELECT name_id FROM transaction_name WHERE trans_name = ? ) AS 'Result check'" );
		
		if ($check->execute(array($type_name))) {
			
			if (($result = $check->fetchColumn()) == 1) {
				
				$type_id= $dbcon->prepare ( "SELECT name_id FROM transaction_name WHERE trans_name = ?" );
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

var_dump(db_request_info(1));

?>