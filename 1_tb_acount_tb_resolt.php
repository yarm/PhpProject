<?php

$conect_to_db = mysql_connect('localhost', 'root', '')
        or die('Ошибка соединения: ' . mysql_error());
mysql_select_db('test');
$tb_accounts = mysql_query("SELECT * FROM `tb_accounts` ORDER BY AccountID");
$tb_results = mysql_query("SELECT * FROM `tb_results` ORDER BY AccountID, Date");

$data = mysql_query("SELECT Date FROM  `tb_results` GROUP BY Date ORDER BY Date");
$output = array();
$output[0][] = "&nbsp;";

while ($date_out = mysql_fetch_array($data, MYSQL_ASSOC)) {
    $output[0][] = $date_out['Date'];
}

while ($name = mysql_fetch_array($tb_accounts, MYSQL_ASSOC)) {
    $output[$name['AccountID']][] = $name['AcountName'];
}

while ($name = mysql_fetch_array($tb_results, MYSQL_ASSOC)) {
    $output[$name['AccountID']][] = $name['Value'];
}

$sum = mysql_query("SELECT SUM(Value) AS Summa FROM `tb_results` GROUP BY Date ORDER BY Date");
$count = count($output) + 1;
$output[$count][] = 'Summa';
while ($summa = mysql_fetch_array($sum, MYSQL_ASSOC)) {
    $output[$count][] = $summa['Summa'];
}

echo "<table>";
foreach ($output as $line) {
    echo "<tr>";
    foreach ($line as $row) {
        echo "<td style='border: 1px solid black;'>" . $row . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
mysql_close($conect_to_db);
?>

