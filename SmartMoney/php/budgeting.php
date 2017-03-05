<?php
					// !-=-=-=-=--==-=-=VALIDATION OF DATA SUBMITH=-=-==-=---=-=-=-=-==!
					
if (isset ( $_POST ['sub'] )) {
	if (isset ( $_POST ['Sum-to-buget'] ) && is_numeric ( $_POST ['Sum-to-buget'] ) && $_POST ['Sum-to-buget'] >= 1) {
		
		
		$sum = $_POST ['Sum-to-buget'];
		
		$budgetType = htmlentities ( $_POST ['income-type'] );
	}
}
?>