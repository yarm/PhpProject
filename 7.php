<?php

$login = mysql_real_escape_string($_POST['login']);
$password = mysql_real_escape_string($_POST['password']);
$res = mysql_query('SELECT id FROM users WHERE login="'.$login.'" AND password="'.$password.'"');
list($user_id) = mysql_fetch_array($res);
session_start();
$_SESSION['authorized'] = isset($user_id);

?>
