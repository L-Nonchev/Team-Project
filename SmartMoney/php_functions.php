<?php

//-=-=-=-=-=-=--=-=-=-=-=-=-=-=-= Create options for INCOME select menu-=-=-=-=-=--=-==-=-=-=-=-=-=-=-=-=\\

function popup_menu_income($incomNames, $customEntry){
		
	for ($in = 0; $in < count($incomNames); $in++){
		
		$name = $incomNames[$in]['trans_name'];
		$value = $incomNames[$in]['name_id'];
		
		echo "<option value='$value'>".$name."</option>";
		
		
	};
	echo "<option value='new'>Other...</option>";
	
	if(count($customEntry['IN']) > 0 && $customEntry['IN']['name_id'] > 10){
		echo ' <option value="" disabled selected>User custom entryes...</option>';
		for ($in = 0; $in < count($customEntry['IN']); $in++){
			$name = $customEntry[$in]['trans_name'];
			$value = $customEntry[$in]['name_id'];
			
			echo "<option value='$value'>".$name."</option>";
			
		};
	};
};

//-=-=-=-=-=-=--=-=-=-=-=-=-=-=-= END of Create options for INCOME select menu-=-=-=-=-=--=-==-=-=-=-=-=-=-=-=-=\\

//-=-=-=-=-=-=--=-=-=-=-=-=-=-=-= Create options for EXPENSE select menu-=-=-=-=-=--=-==-=-=-=-=-=-=-=-=-=\\

function popup_menu_expenses($expenseNames, $customEntry) {
	
	for ($in = 0; $in < count($expenseNames); $in++){
		
		$name = $expenseNames[$in]['trans_name'];
		$value = $expenseNames[$in]['name_id'];
		
		echo "<option value='$value'>".$name."</option>";
		
		
	};
	echo "<option value='new'>Other...</option>";
	
	if(count($customEntry['OUT']) > 0 && $customEntry['OUT']['name_id'] > 10){
		echo ' <option value="" disabled selected>User custom entryes...</option>';
		for ($in = 0; $in < count($customEntry['OUT']); $in++){
			$name = $customEntry[$in]['trans_name'];
			$value = $customEntry[$in]['name_id'];
			
			echo "<option value='$value'>".$name."</option>";
			
		}
	}
	
};

//-=-=-=-=-=-=--=-=-=-=-=-=-=-=-= END of Create options for EXPENSE select menu-=-=-=-=-=--=-==-=-=-=-=-=-=-=-=-=\\

//-=-=-=-=-=-=--=-=-=-=-=-=-=-=-= Create options for SAVINGS select menu-=-=-=-=-=--=-==-=-=-=-=-=-=-=-=-=\\

function popup_menu_savings($savings) {
	
	for ($in = 0; $in < count($expenseNames); $in++){
		
		$name = $expenseNames[$in]['trans_name'];
		$value = $expenseNames[$in]['name_id'];
		
		echo "<option value='$value'>".$name."</option>";
		
		
	};
	echo "<option value='new'>Other...</option>";
	
	if(count($customEntry['OUT']) > 0 && $customEntry['OUT']['name_id'] > 10){
		echo ' <option value="" disabled selected>User custom entryes...</option>';
		for ($in = 0; $in < count($customEntry['OUT']); $in++){
			$name = $customEntry[$in]['trans_name'];
			$value = $customEntry[$in]['name_id'];
			
			echo "<option value='$value'>".$name."</option>";
			
		}
	}
	
};

//-=-=-=-=-=-=--=-=-=-=-=-=-=-=-= END of Create options for SAVINGS select menu-=-=-=-=-=--=-==-=-=-=-=-=-=-=-=-=\\

//=-=-=-=-=--=-==-=-==--=Function for fetching income data=-=-=-=-=-=-=-=--=-=-=-=-==--\\

function export_income_data($allIncome){	
	
	if (count($allIncome)){
		
		for($in = 0; $in < count ( $allIncome ); $in ++) {
			
			echo '<div class="progress-bar-linear">';
			echo '<p class="progress-bar-text">'. $allIncome[$in]['name'];
			echo "<span>" . $allIncome [$in] ['sum'] . "$</span> </p>";
			echo "<hr class='progress-bar' /></div></div>";
		};
	}
};

//=-=-=-=-=--=-==-=-==--=END of Function for fetching income data=-=-=-=-=-=-=-=--=-=-=-=-==--\\

//=-=-=-=-=--=-==-=-==--=Function for fetching spendings data=-=-=-=-=-=-=-=--=-=-=-=-==--\\

function export_expense_data($allExpenses){	
	
	if (count($allExpenses)){
		
		for($in = 0; $in < count ( $allExpenses); $in ++) {
			
			echo '<div class="progress-bar-linear">';
			echo "<div class='bar-text-content'>";
			echo '<p class="progress-bar-text">'. $allExpenses[$in]['name'];
			echo "<span>" . $allExpenses[$in] ['sum'] . "$</span> </p></div>";
			echo "<hr class='progress-bar' /></div></div>";
		};
	}
};

//=-=-=-=-=--=-==-=-==--=END of Function for fetching spendings data=-=-=-=-=-=-=-=--=-=-=-=-==--\\

?>