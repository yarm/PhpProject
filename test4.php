<?php
$login = mysql_real_escape_string($_POST['login']);
$password = mysql_real_escape_string($_POST['password']);
if ($query = mysql_query("SELECT `id` FROM `users` WHERE login=$login AND password=$password")) {
    list($uid) = mysql_fetch_array($query);
    session_start();
    $_SESSION['auth'] = $user_id;
} else {
    echo 'Mlia...';
}
?>

<? ob_start();?> 
<? ob_start();?> 
<? $str= ob_get_clean(); print str_replace("&nb"."sp;"," ".htmlspecialchars($str),$str)?>
<? $str= ob_get_clean(); print str_replace("&nb"."sp;"," ".htmlspecialchars($str),$str)?>