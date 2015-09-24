<?php
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}
mysql_select_db("db_name") or die('BD not selected');
if (($handle_o = fopen("test1.csv", "r") ) !== FALSE) {
    $columns = fgetcsv($handle_o, 1000, ";");
    mysql_query("CREATE TABLE IF NOT EXISTS `name_new`(
   `$columns[0]` varchar(100)  NOT NULL ,
   `$columns[1]` varchar(100) ,
   `$columns[2]` varchar(100) NOT NULL,
   `$columns[3]` varchar(100) NOT NULL,
   `$columns[4]` varchar(100) NOT NULL,
    PRIMARY KEY(`$columns[1]`)
    )") or die(mysql_error());
    while (($columns_o = fgetcsv($handle_o, 1000, ";")) !== FALSE) {
        $query = "INSERT INTO `name_new` ( `$columns[0]`,`$columns[1]`,`$columns[2]`,`$columns[3]`,`$columns[4]`) "
                . " VALUES ( '" . iconv('WINDOWS-1251', 'UTF-8', $columns_o[0]) . "','" . $columns_o[1] . "','" . $columns_o[2] . "','" . $columns_o[3] . "','" . $columns_o[4] . "') "
                . " ON DUPLICATE KEY UPDATE `" . $columns[0] . "` = '" . iconv('WINDOWS-1251', 'UTF-8', $columns_o[0]) . "',"
                . " `" . $columns[2] . "` = '" . $columns_o[2] . "',`" . $columns[3] . "` = '" . $columns_o[3] . "',"
                . " `" . $columns[4] . "` = '" . $columns_o[4] . "'";
        
        mysql_query($query);
    }
}
$tb_results = mysql_query("SELECT * FROM `name_new` ORDER BY $columns[0]");
echo implode('; ', $columns) . "<br/>";
while ($name = mysql_fetch_array($tb_results, MYSQL_ASSOC)) {
if ($name[$columns[0]]=='' && $name[$columns[1]]=='' ){} else {
    echo $name[$columns[0]]."; ".$name[$columns[1]]."; ".$name[$columns[2]]."; ".$name[$columns[3]]."; ".$name[$columns[4]].'</br>';
}
}
fclose($handle_o);
mysql_close($link);
?>