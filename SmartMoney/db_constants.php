<?php

//-=-=-=-=-=-=-=-=-=-=-=-=-=--=  Define connection constants -=-=-=-=-==-==-==-=-===-==-=\\
						
define ( 'DB_USER', 'root' );
define ( 'DB_PASS', '' );
define ( 'DB_HOST', 'localhost' );
define ( 'DB_NAME', 'smart_money' );

//-=-=-=-=-=-=-=-=-=-=-=-=-=--=END of Define connection constants -=-=-=-=-==-==-==-=-===-==-=\\

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= Define user info request  -=-=-=-=-==-==-==-=-===-==-=\\

define('REQUEST_USER_INFO_SQL', '"SELECT ua.transaction_sum, tn.trans_name, tt.trans_type, ua.transaction_date 
FROM users u INNER JOIN user_account ua ON( u.user_id = ua.user_id)
INNER JOIN transaction_name tn ON( ua.name_id = tn.name_id)
INNER JOIN transaction_type tt ON( ua.type_id = tt.type_id)
WHERE u.user_id = ? "');

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= END of Define user info request -=-=-=-=-==-==-==-=-===-==-=\\

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= Define expense insert for user -=-=-=-=-==-==-==-=-===-==-=\\

define('INSERT_USER_EXPENSE_SQL', '"INSERT INTO user_account (user_id, transaction_sum, transaction_date, type_id, name_id )
VALUES (?, ?, NOW(), ?, ?)"');

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= END of Define expense insert for user-=-=-=-=-==-==-==-=-===-==-=\\

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= Define insert type of expense -=-=-=-=-==-==-==-=-===-==-=\\

define('INSERT_TYPE_OF_EXPENSE_SQL', '"INSERT INTO transaction_name ( trans_name)
VALUES(?) "');

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= END of Define insert type of expense-=-=-=-=-==-==-==-=-===-==-=\\

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= Define cheching for expense existence -=-=-=-=-==-==-==-=-===-==-=\\

define('CHECK_IF_TYPE_EXPENSE_EXIST_SQL', '"SELECT EXISTS (SELECT name_id FROM transaction_name WHERE trans_name = ? ) 
AS \'Result check\'" ');

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= END of Define cheching for expense existence -=-=-=-=-==-==-==-=-===-==-=\\

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= Define chech for expense name -=-=-=-=-==-==-==-=-===-==-=\\

define('SELECT_TRANSACTION_NAME_ID_SQL', '"SELECT name_id FROM transaction_name WHERE trans_name = ?"');

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= END of Define chech for expense name -=-=-=-=-==-==-==-=-===-==-=\\

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= Define fech user name -=-=-=-=-==-==-==-=-===-==-=\\

define('SELECT_USER_NAME_SQL', "SELECT user_name FROM users WHERE user_id = ?");

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= END of Define fech user name-=-=-=-=-==-==-==-=-===-==-=\\

?>