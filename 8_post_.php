<?php
$email = 'djadjavano@mail.ru';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo'!Введите коректный мейл <br>';
    return 0;
}
$email_arr = explode("@", $email);
$host = $email_arr[1];
if (!getmxrr($host, $mxhostsarr)) {
    echo "На адрес $email отправка почты невозможна";
    return 0;
}
getmxrr($host, $mxhostsarr, $weight);
  echo "На $email письма могут отправляться через следующие хосты:<br>";
  for ($i = 0; $i < count($mxhostsarr); $i++) {
  echo ("$mxhostsarr[$i] = $weight[$i]<br>");
  } 
//$res = mail($email, "мейл", "Проверка существования мейла");
if ($res) {
    echo "ожидает доставки";
} else {
    echo "ошибка отправки";
}

