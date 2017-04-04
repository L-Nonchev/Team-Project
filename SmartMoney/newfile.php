<?php

// !-- =-=-=-=-=-=-=Login information retrive=-=-=-=-=-=-= --
include './db_connection.php';
include './php_functions.php';
$user_id = $_SESSION['user_id'];

$profilePicture = db_user_picture_address($user_id);

$userName = db_user_name($_SESSION['user_id']);

$info = db_request_info($user_id);

$expenseNames = get_defalt_epense_names();

$incomNames = get_defalt_income_names();

$customEntry = $info;

$allIncome =  $info['IN'];
$allExpenses =  $info['OUT'];
$savings = 0;

$sumIN = 0;
for ($in = 0; $in < count($allIncome); $in++){
	$sumIN += $allIncome[$in]['sum'];
};

$sumOUT = 0;
for ($in = 0; $in < count($allExpenses); $in++){
	$sumOUT += $allExpenses[$in]['sum'];
};

$userIncome =  $sumIN;
$userÅxpenses = $sumOUT;
$balance = $userIncome - $userÅxpenses;

?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	      <div class="modal fade" id="request-quote-3" role="dialog"  aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-body">
                  <div class="quotation-box-2">
                     <h2>Add expense</h2>
                     <br />                    
                     <form action="porch.php" method="post">
                        <div class="row clearfix">
                           <!--Form Group-->                          
                           <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <input class="form-control" type="number" placeholder="Sum amount"  name="Sum-to-buget">
                              <br />
                           </div>
                           <!--Form Group-->
                           <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <select class="form-control" name="expense-type" id="selectsum" onchange="check_for_new()">
                                <?php 
	                                popup_menu_savings($expenseNames, $customEntry);
                                 ?>                            
                              </select>
                              
                           </div>  
                            <div class="form-group col-md-12 col-sm-12 col-xs-12" id="Sum_type_new" style="visibility:hidden" >
                              <input  class="form-control" type="text" placeholder="Enter the name of the expense"  name="Sum_type_new">
                              <br />
                           </div>                         
                           <!--Form Group-->
                           <div><input id="sub-button" type="submit" name="sub-expense"/></div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
	
	 <script type="text/javascript" src="./js/select_sum.js"></script>
</body>
</html>