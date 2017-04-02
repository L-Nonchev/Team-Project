<?php
// -=-==-=--=-=-=-=-=-=--=-==--==-= DB Constants=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\
require './db_constants.php';
// -=-==-=--=-=-=-=-=-=--=-==--==-= END of DB Constants=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= DB connection establish=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\
function db_connection(){
	$dbcon = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
	$dbcon->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	return $dbcon;
};

// -=-==-=--=-=-=-=-=-=--=-==--==-=END of DB connection establish=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function cach_handler($e){
	$errorType = $e->errorInfo . "<br />";
	$errorMessage = $e->getMessage ();
	mail ( 'jasensolid@gmail.com', $errorType, $errorMessage );
	header ( 'Location: ./404.html' );
};



// -=-==-=--=-=-=-=-=-=--=-==--==-= DB User info Request function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\
function db_request_info($user_id) {	
	try {
		
		$dbcon = db_connection();
		
		$carryer = $dbcon->prepare ( REQUEST_USER_INFO_SQL );
		if ($carryer->execute ( array ($user_id) )) {
			$sums_in = array ();
			$sums_out = array();
			$in = 0;
			$out = 0;
			while ( $row = $carryer->fetch ( PDO::FETCH_ASSOC ) ) {				
				
				if ($row['trans_type'] == 'IN') {					
					$sums_in[$in]['sum'] = $row['transaction_sum'];
					$sums_in[$in]['name'] = $row['trans_name'];
					$sums_in[$in]['name_id'] = $row['name_id'];
					$sums_in[$in]['date'] = $row['transaction_date'];		
					$in++;
					
				}elseif($row['trans_type'] == 'OUT') {					
					$sums_out[$out]['sum'] = $row['transaction_sum'];
					$sums_out[$out]['name'] = $row['trans_name'];
					$sums_out[$out]['name_id'] = $row['name_id'];
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
		
		 cach_handler($e);
	}
};

// -=-==-=--=-=-=-=-=-=--=-==--==-=END of DB User info Request function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\


// -=-==-=--=-=-=-=-=-=--=-==--==-= DB User expense Insert function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\
function db_insert_expense($user_id, $sum, $type_of_expense, $name_of_expense) {
	
	$user_id = htmlentities ( $user_id );
	$sum = htmlentities ( $sum );
	$type_of_expense = htmlentities ( $type_of_expense );
	$name_of_expense = htmlentities ( $name_of_expense );
	
	try {
		$dbcon = db_connection ();
		
		$execute = $dbcon->prepare ( INSERT_USER_EXPENSE_SQL );
		
		if ($execute->execute ( array (	$user_id, $sum,	$type_of_expense, $name_of_expense ) )) {
			
			return true;
		} else {
			
			return false;
		}
		;
	} catch ( PDOException $e ) {
		cach_handler ( $e );
	}
};
// -=-==-=--=-=-=-=-=-=--=-==--==-= END of DB User expense Insert function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= DB   type insert function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function db_insert_type_of_expense($type_name) {
	$type_name = htmlentities ( $type_name );
	
	try {
		$dbcon = db_connection ();
		
		$execute = $dbcon->prepare ( INSERT_TYPE_OF_EXPENSE_SQL );
		
		if ($execute->execute ( array (
				$type_name 
		) )) {
			
			$result = true;
			echo $result;
		} else {
			
			$result = false;
			echo $result;
		}
		;
	} catch ( PDOException $e ) {
		cach_handler ( $e );
	}
};

// -=-==-=--=-=-=-=-=-=--=-==--==-=END of  DB Spend type insert function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\



// -=-==-=--=-=-=-=-=-=--=-==--==-= DB Spend type check function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function db_expense_name_check($type_name) {
	$type_name = htmlentities ( $type_name );
	
	try {
		$dbcon = db_connection ();
		
		$check = $dbcon->prepare ( CHECK_IF_TYPE_EXPENSE_EXIST_SQL );
		
		if ($check->execute ( array (
				$type_name 
		) )) {
			
			if (($result = $check->fetchColumn ()) == 1) {
				
				$type_id = $dbcon->prepare ( SELECT_TRANSACTION_NAME_ID_SQL );
				$type_id->execute ( array (
						$type_name 
				) );
				$type_id = $type_id->fetchColumn ();
				
				echo "Id-to na razhoda e: " . $type_id;
			} elseif (($result = $check->fetchColumn ()) == 0) {
			}
		} else {
			
			$result = false;
			echo $result;
		}
		;
	} catch ( PDOException $e ) {
		cach_handler ( $e );
	}
};

// -=-==-=--=-=-=-=-=-=--=-==--==-= END of DB Spend type check function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= DB User Name function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function db_user_name($user_id) {
		
	try {
		$dbcon = db_connection ();
		
		$execute = $dbcon->prepare ( SELECT_USER_NAME_SQL );
		
		if ($execute->execute ( array (
				$user_id 
		) )) {
			
			$result = $execute->fetchColumn ();
			return $result;
		} else {
			
			$result = false;
			return $result;
		}
		;
	} catch ( PDOException $e ) {
		cach_handler ( $e );
	}
};

// -=-==-=--=-=-=-=-=-=--=-==--==-=END of DB User Name function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= DB User Picture address retrive function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function db_user_picture_address($user_id){
	try {
		$dbcon = db_connection();
		$execute = $dbcon->prepare ( FECH_PIC_ADDRESS_SQL );
		if ($execute->execute ( array ($user_id) )) {
			
			$result = $execute->fetchColumn ();
			return $result;
	
		} else {
			
			$result = false;
			return $result;
		};	
		
	} catch (PDOException $e) {
		cach_handler($e);
	}
};

// -=-==-=--=-=-=-=-=-=--=-==--==-=END of DB User Picture address retrive function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= Creat acount for new users=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function db_create_user ($firstName, $lastName, $email, $password, $pathImage ) {

	//-=-=-=-=-=-=---==-=-=-= Check input =-=-=-==-=-==-=-==--\\
	$firstName = htmlentities($firstName);
	$lastName = htmlentities($lastName);
	$email = htmlentities($email);
	$password = htmlentities($password);


	//-=-=-=-=-=-=---==-=-=-= Hash input=-=-=-==-=-==-=-==--\\
	$mailSha1 = sha1($email);
	$passMd5 = md5($password);
	$passSha1 = sha1($passMd5);


	try{
	
		$dbcon = db_connection();
		//-=-=-=-=-=-=---==-=-=-= Insert data=-=-=-==-=-==-=-==--\\

		// check for exist e-mail
		$check = $dbcon->prepare(SELECT_USER_ID_SQL);
		$check->execute(array($mailSha1, $passSha1));
		if ($check->fetchColumn() > 0) {

			$result = false;
			return $result;

		} else {
			//insert new user
			$stmt = $dbcon->prepare(INSERT_USER_DATA_SQL);
			if ($stmt->execute(array($firstName, $lastName, $mailSha1, $passSha1, $pathImage))){
				
				//-=-=-=-=-=-=---==-=-=-= Creat folder for client =-=-=-==-=-==-=-==--\\
				
				mkdir('./assets/users/'. $mailSha1 );
				mkdir('./assets/users/'.$mailSha1.'/image');

				//-=-=-=-=-=-=---==-=-=-= CREATE  SESSION =-=-=-==-=-==-=-==--\\
				session_start();
				
				$userID = $dbcon->lastInsertId();

				$_SESSION['user_id'] = $userID;

				$result = true;
				return $result;
			}
		}
	} catch ( PDOException $e ) {
		cach_handler($e);
	}

}

// -=-==-=--=-=-=-=-=-=--=-==--==-= END of DB Creat acount for new users=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= Log In chek =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function logInUser ($email, $password){

	$email = htmlentities($email);
	$password = htmlentities($password);


	//-=-=-=-=-=-=---==-=-=-= Hash input=-=-=-==-=-==-=-==--\\
	$mailSha1 = sha1($email);
	$passMd5 = md5($password);
	$passSha1 = sha1($passMd5);

	try{
	
		$dbcon = db_connection();

			
		$check = $dbcon->prepare(SELECT_USER_ID_SQL);
		$check->execute(array($mailSha1, $passSha1));;
		$userId = $check->fetch(PDO::FETCH_COLUMN);
			
		if ($userId > 0 ){
			//-=-=-=-=-=-=---==-=-=-= Create SESSION =-=-=-==-=-==-=-==--\\
			session_start();

			$_SESSION['user_id'] = $userId;

			$result = true;
			return $result;
		}else {

			$result = false;
			return $result;
		}
			
			
	} catch ( PDOException $e ) {
		cach_handler($e);
	}
}
// -=-==-=--=-=-=-=-=-=--=-==--==-= END of Log In chek =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= Get email for user =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function getEmail ($user_id) {

	try{
	
		$dbcon = db_connection();
		
		$check = $dbcon->prepare(FETCH_EMAIL_SQL);
		$check->execute(array($user_id));
		$email = $check->fetch(PDO::FETCH_COLUMN);
	
		return $email;
		
		} catch ( PDOException $e ) {
			cach_handler($e);
		}
}

// -=-==-=--=-=-=-=-=-=--=-==--==-= END of Get email for user =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= Get email for user =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function updateImage ($user_id, $imgPath){
	
	try{
	
		$dbcon = db_connection();
	
		$check = $dbcon->prepare(UPDATE_PIC_ADDRESS_SQL);
		if ($check->execute(array($imgPath, $user_id))){
			return true;
		}
	
	} catch ( PDOException $e ) {
		cach_handler($e);
	}
	
}

// -=-==-=--=-=-=-=-=-=--=-==--==-= END of Get email for user =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= Update user password =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\
function updatePassword ($user_id, $password){
	
	$password = htmlentities($password);
	$passMd5 = md5($password);
	$passSha1 = sha1($passMd5);

	try{

		$dbcon = db_connection();
		
		$check = $dbcon->prepare(UPDATE_USER_PASSWORD_SQL);
		if ($check->execute(array($passSha1, $user_id))){
			return "Òhe password is changed successfully";
		}

	} catch ( PDOException $e ) {
		cach_handler($e);
	}
};

// -=-==-=--=-=-=-=-=-=--=-==--==-= END of Update user password =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= Get defalt expense names =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function get_defalt_epense_names (){
	

	try{
		
		$dbcon = db_connection();
		$names = array();
		$in = 0;
		foreach ($dbcon->query(ALL_EXPANSE_NAMES_SQL, PDO::FETCH_ASSOC) as $row){
			
			$names[$in] = $row;
			$in++;
		}
		return $names;
		
		
	} catch ( PDOException $e ) {
		cach_handler($e);
	}
};

// -=-==-=--=-=-=-=-=-=--=-==--==-= END of Get defalt expense names =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= Get defalt income names =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function  get_defalt_income_names(){
	try{		
		$dbcon = db_connection();
		$names = array();
		$in = 0;
		foreach ($dbcon->query(ALL_INCOME_NAMES_SQL, PDO::FETCH_ASSOC) as $row){
			
			$names[$in] = $row;
			$in++;
		}
		return $names;
		
		
	} catch ( PDOException $e ) {
		cach_handler($e);
	}
};

// -=-==-=--=-=-=-=-=-=--=-==--==-= END of Get defalt income names =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\


?>