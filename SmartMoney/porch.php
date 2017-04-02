<?php
session_start();
include 'db_connection.php';

//=-=-=-=-=-=-=--=-=-=--=-=-==-=-==-=--=Validating expense input=-=-=-=-=-=-=-=-=-=--=-=-=--=-=--=\\

if (isset($_POST['sub-expense']) && isset($_POST['Sum-to-buget'])) {
	$userId = $_SESSION['user_id'];	
	$typeOfExp = 2;
	$flag = false;
	if (is_numeric($_POST['Sum-to-buget']) && $_POST['Sum-to-buget'] > 0) {		
		$sum = $_POST['Sum-to-buget'];
	}else {
		$flag = true;
	};
	if (is_numeric($_POST['expense-type']) && $_POST['expense-type'] > 0){
		$nameOfExpanse = $_POST['expense-type'];
	}elseif ($_POST['expense-type'] == 'new'){
		
	}else {
		$flag = true;
	}
	
	if ($flag == false){
		db_insert_expense($userId, $sum, $typeOfExp, $nameOfExpanse);
		header('location:about.php');
	}else {
		echo "ne minava pri flaga";
	}
	
}else {
	echo "ne minava nachaloto";
};

//=-=-=-=-=-=-=--=-=-=--=-=-==-=-==-=--=END of Validating expense input=-=-=-=-=-=-=-=-=-=--=-=-=--=-=--=\\









?>