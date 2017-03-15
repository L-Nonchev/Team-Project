<?php
//-=-=-=-=-=-=---==-=-=-= Log Out - Cookies Delete=-=-=-==-=-==-=-==--\\
// creat cookie for client acces
$cookie_name = "logged-in";
$cookie_value  = $email;
$cookie_exp = time() - 3600; // destroy cookie
// create cookie
setcookie($cookie_name, $cookie_value , $cookie_exp , "/");

//-=-=-=-=-=-=---==-=-=-= Redirect =-=-=-==-=-==-=-==--\\
echo "da";
header('Location: ../index.php', true, 303);
die();

?>