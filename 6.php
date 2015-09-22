<?php

$string = array();
$string[1] = 'revolution vol 1';
$string[6] = 'revolution part 2';
$string[10] = 'revolution apart for volume 3';
$key = 0;
echo 'индекс элемента массива в котором присутсвует «vol» только один раз: ';
while ($key <= 10) {
    if (mb_substr_count($string[$key], "vol") == 1)
        echo $key . " ";
    $key++;
}
echo '<br>индекс элемента массива в котором присутсвует «vol» 2 раза: ';
$key = 0;
while ($key <= 10) {
    if (mb_substr_count($string[$key], "vol") == 2)
        echo $key . " ";
    $key++;
}
echo '<br>индекс элемента массива в котором присутсвует «vol» и до и после этого слова стоит пробел: ';
$key = 0;
while ($key <= 10) {
    if (mb_substr_count($string[$key], " vol ") != 0)
        echo $key . " ";
    $key++;
}
echo '<br>индекс элемента массива в котором присутсвует «vol» в начале строки: ';
$key = 0;
while ($key <= 10) {
    $k = substr($string[$key], 0, 3);
    if ($k == 'vol')
        echo $key . " ";
    $key++;
}
echo '<br>индекс элемента массива в котором не присутсвует «par» в начале строки; ';
$key = 0;
while ($key <= 10) {
    $k = substr($string[$key], 0, 3);
    if (($k != 'par') && (strlen($string[$key]) != 0))
        echo $key . " ";
    $key++;
}
?>
