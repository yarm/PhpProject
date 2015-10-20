<?php
$login = 'pravilnij login';
$pass = 'pravilnij parol';
$login = stripslashes($login);
$login = htmlspecialchars($login);
$pass = stripslashes($pass);
$pass = htmlspecialchars($pass);
$login = trim($login);
$pass = trim($pass);
if (strcmp($_POST['login'], $login) !== 0 || strcmp($_POST['pass'], $pass) !== 0) {
    echo 'you are not allowed to visit this page!';
} else {
    echo 'you registered';
}
//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали
// + убираем пробелы в конце и начале логина и пароля
//скобки замін ['] на [']
//видалити пробіл з пароля
//REQUEST->post



/*$login=’pravilnij login’;
$pass= ’pravilnij parol’;
if ($_REQUEST['login']<>$login or $_REQUEST['pass']<>$pass){
echo 'you are not allowed to visit this page!';
} else {
// sensible content
echo 'sensible content';
}*/


