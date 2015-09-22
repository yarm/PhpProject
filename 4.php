<?php

$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}
mysql_select_db("db_name") or die('BD not selected');

$row = 1;
if ( ($handle_o = fopen("test1.csv", "r") ) !== FALSE ) {
$columns_o = fgetcsv($handle_o, 1000,";");
$a=iconv("WINDOWS-1251", "UTF-8",$columns_o[0]);
$b=iconv("WINDOWS-1251", "UTF-8",$columns_o[1]);
$c=iconv("WINDOWS-1251", "UTF-8",$columns_o[2]);
$d=iconv("WINDOWS-1251", "UTF-8",$columns_o[3]);
$e=iconv("WINDOWS-1251", "UTF-8",$columns_o[4]);
mysql_query("CREATE TABLE IF NOT EXISTS `tb_name`(
   
`$a` varchar(100)  NOT NULL ,
    `$b` varchar(100) ,
        `$c` varchar(100) NOT NULL,
            `$d` varchar(100) NOT NULL,
                `$e` varchar(100) NOT NULL,

                PRIMARY KEY(`$b`)

    )") or die(mysql_error());

}

echo("<br />");

if (($handle = fopen("test1.csv", "r"))) {
    while (($data = fgetcsv($handle, 1000))) {
        $num = count($data);
        $row++;
        for ($c=0; $c < $num; $c++) {
        var_dump( $data[$c]) . "\n";
        }echo "  <br />\n";
      }
    
    fclose($handle);
    
}
 
mysql_close($link);
/*if ( ($handle_o = fopen("test1.csv", "r") ) !== FALSE ) {
// читаем первую строку и разбираем названия полей
$columns_o = fgetcsv($handle_o, 1000,";");
foreach( $columns_o as $v ) {
$insertColumns[]="'".addslashes(trim($v))."'";
}
$columns=implode(';',$insertColumns);


while ( ($data_o = fgetcsv($handle_o, 1000)) !== FALSE) {
$insertValues = array();
foreach( $data_o as $v ) {
$insertValues[]="'".addslashes(trim($v))."'";
}
$values=implode(';',$insertValues);
$sql = "INSERT INTO `tb_name` ( $columns ) VALUES ( $values )";
mysql_query($sql) or die('SQL ERROR:'.mysql_error());
}

}
fclose($handle_o); 
mysql_close($link);*/


     
         ?>