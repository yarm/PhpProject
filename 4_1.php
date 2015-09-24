<?php
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}
mysql_select_db("db_name") or die('BD not selected');

if ( ($handle_o = fopen("test1.csv", "r") ) !== FALSE ) {
$columns_o = fgetcsv($handle_o, 1000,";");
$a='name';
$b='email';
$c='birthday';
$d='register';
$e='status';
/*$a=iconv("WINDOWS-1251", "UTF-8", $columns_o[0]);
$b=iconv("WINDOWS-1251", "UTF-8", $columns_o[1]);
$c=iconv("WINDOWS-1251", "UTF-8", $columns_o[2]);
$d=iconv("WINDOWS-1251", "UTF-8", $columns_o[3]);
$e=iconv("WINDOWS-1251", "UTF-8", $columns_o[4]);
$a=$columns_o[0];
$b=$columns_o[1];
$c=$columns_o[2];
$d=$columns_o[3];
$e=$columns_o[4];*/
mysql_query("CREATE TABLE IF NOT EXISTS `name_new`(
   
`$a` varchar(100)  NOT NULL ,
    `$b` varchar(100) NOT NULL,
        `$c` varchar(100) NOT NULL,
            `$d` varchar(100) NOT NULL,
                `$e` varchar(100) NOT NULL,

                PRIMARY KEY(`$b`)

    )") or die(mysql_error());
while ( ($columns_o = fgetcsv($handle_o, 1000,";")) !== FALSE) { 
    
    
 $query = "INSERT INTO `name_new` ( ".$a.",".$b.",".$c.",".$d.",".$e." ) VALUES ( '". iconv('WINDOWS-1251', 'UTF-8', $columns_o[0])."','".$columns_o[1]."','".$columns_o[2]."','".$columns_o[3]."','".$columns_o[4]."')";
     //var_dump($query);
    //$temp = mysql_query($query);
 //$temp = mysql_query("INSERT INTO `name_new` (name) VALUES('ggdsjhgfd@gsfhkjsdgf')");
// var_dump($temp);
//die;
}

}
fclose($handle_o); 
mysql_close($link);
?>