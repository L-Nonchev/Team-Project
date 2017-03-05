<?php
							// !-=-=-=-=--==-=-=VALIDATION OF SUBMITH=-=-==-=---=-=-=-=-==!
$buget1 = 60;
$sum = 100;

if (! isset ( $_POST ['sub'] )) {
	
} else {
	if (isset ( $_POST ['Sum-to-buget'] ) && is_numeric ( $_POST ['Sum-to-buget'] ) && $_POST ['Sum-to-buget'] >= 1) {
		$sum = $_POST ['Sum-to-buget'];
		
		$budgetType = htmlentities ( $_POST ['income-type'] );
	}
}
$buget1 = 60;



?>