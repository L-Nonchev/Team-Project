<?php
session_start();
require 'db_connection.php';

if (isset($_POST['sub'])){
	
	$sumIn = $_POST['Sum-to-buget'] + 0;
	
	if (is_numeric($sumIn) && $sumIn > 0){
		
		$user_id = $_SESSION['user_id'];
		
		
	}
	
}










?>
