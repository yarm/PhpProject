<?php

$string = array();
$string[1] = 'revolution vol 1';
$string[6] = 'revolution part 2';
$string[10] = 'revolution apart for volume 3';
$key = 0;
$a = '';
$b = '';
$c = '';
$d = '';
$e = '';
while ($key <= 10) {
    if (preg_match_all('/(vol)/', $string[$key], $matches) == 2) {
        $a.=$key . ' ';
    }
    if (preg_match_all('/(vol)/', $string[$key], $matches) == 1) {
        $b.=$key . ' ';
    }
    if (preg_match('/( vol )/', $string[$key])) {
        $c.=$key . ' ';
    }
    if (preg_match('/^vol/', $string[$key])) {
        $d.=$key . ' ';
    }
    if (!preg_match('/^par/', $string[$key]) &&  strlen($string[$key])!=0) {
        $e.=$key . ' ';
    }
    $key++;
}
echo $a . '</br>' . $b . '</br>' . $c . '</br>' . $d . '</br>' . $e;
?>
