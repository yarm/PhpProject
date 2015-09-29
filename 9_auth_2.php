<?php
$login='pravilnij login';
//скобки замін ['] на [']
$pass= 'pravilnij parol';

if ($_POST['login']<>$login or $_POST['pass']<>$pass){

echo 'you are not allowed to visit this page!';

} else {

// sensible content

echo 'sensible content';

}
?>

