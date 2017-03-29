<?php
//-=-=-=-=-=-=---==-=-=-= Log Out - SESSION DESTROY=-=-=-==-=-==-=-==--\\
session_start();

unset($_SESSION['user_id']);


//-=-=-=-=-=-=---==-=-=-= Redirect =-=-=-==-=-==-=-==--\\
echo "da";
header('Location: ../index.php', true, 303);
die();

?>