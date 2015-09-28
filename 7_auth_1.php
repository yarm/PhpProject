<?php
        $link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}
mysql_select_db("test") or die('BD not selected');
/*$login = mysql_real_escape_string($_POST['login']);
$password = mysql_real_escape_string($_POST['password']);
if ($res = mysql_query('SELECT id FROM users WHERE login="'.$login.'" AND password="'.$password.'"')) {
    list($user_id) = mysql_fetch_array($res);
    session_start();
    $_SESSION['authorized'] = isset($user_id);
} else {
    echo 'Not auth...';
}*/
$login = $_REQUEST['login'];
$password = $_REQUEST['password'];
$res = mysql_query('SELECT id FROM users

WHERE login="'.$login.'" AND password="'.$password.'"');
list($user_id) = mysql_fetch_array($res);
session_start();
var_dump($res);
$_SESSION['authorized'] = isset($user_id);

//UPDATE users SET password='0' WHERE login='admin'
?>

