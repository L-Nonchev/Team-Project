<?php
//-=-=-=-=-=-=---==-=-=-= Log Out - SESSION DESTROY=-=-=-==-=-==-=-==--\\
session_start();

unset($_SESSION['user_id']);
unset($_SESSION['user_name']);

//-=-=-=-=-=-=---==-=-=-= Redirect =-=-=-==-=-==-=-==--\\
echo "da";
header('Location: ../index.php', true, 303);
die();

?>