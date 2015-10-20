<?php

class init {

    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_name = 'db_name';
    private $db_table1 = 'info';
    private $db_table2 = 'data';
    private $db_table3 = 'link';

    private function connect() {
        $link = mysql_connect($this->db_host, $this->db_user, $this->db_pass);
        if (!$link) {
            die('Ошибка соединения: ' . mysql_error());
        }
    }

    private function sel_db() {

        $sel_db = mysql_select_db($this->db_name);
        if (!$sel_db) {
            die('' . mysql_error());
        }
    }

    private function create1() {
        $tb_test = mysql_query("CREATE TABLE `info` (
         `idq` int(11) NOT NULL auto_increment,
        `name` varchar(255) default NULL,
         `desc` text default NULL,
         PRIMARY KEY (`idq`)
         ) ENGINE=MyISAM DEFAULT CHARSET=cp1251;");
        for ($i = 0; $i <= 50000; $i++) {
            $name = uniqid();
            $desc = uniqid();
            
            $tb_input1 = mysql_query("INSERT INTO `info` (`name`,`desc`) VALUES ('$name', '$desc')");
        }
    }

    private function create2() {
        $tb_test = mysql_query("CREATE TABLE `data` (
         `id` int(11) NOT NULL auto_increment,
         `date` date default NULL,
         `value` INT(11) default NULL,
         PRIMARY KEY (`id`)
         ) ENGINE=MyISAM DEFAULT CHARSET=cp1251;");
        for ($i = 0; $i <= 50000; $i++) {
            $date = uniqid();
            $value = mt_rand(1, 5);
            
            $tb_input2 = mysql_query("INSERT INTO `data` (`date`,`value`) VALUES ('$date', '$value')");
        }
    }

    private function create3() {
        $tb_test = mysql_query("CREATE TABLE `link` (
         `data_id` int(11) NOT NULL,
         `info_id` int(11) NOT NULL,
         PRIMARY KEY (`data_id`)
          ) ENGINE=MyISAM DEFAULT CHARSET=cp1251;");
        for ($i = 0; $i <= 50000; $i++) {
            $data_id = mt_rand(1, 10000);
            $info_id = mt_rand(1, 10000);
            
            $tb_input3 = mysql_query("INSERT INTO `link` (`data_id`,`info_id`) VALUES ('$data_id', '$info_id')");
        }
    }
    public function __construct() {
        $this->connect();
        $this->sel_db();
        $this->create1();
        $this->create2();
        $this->create3();
    }
    public function rez(){
        $res2=mysql_query("EXPLAIN select * from link INNER JOIN (data, info) ON (link.data_id = data.id AND link.info_id = info.idq)");    
while ($tb_results = mysql_fetch_array($res2, MYSQL_ASSOC)) {
    var_dump($tb_results);
            echo '<br>';
    }
}
}
$obj = new init();
$obj->rez();
//select * from link INNER JOIN (data, info) ON (link.data_id = data.id AND link.info_id = info.idq)
//select * from data, link, info where link.info_id = info.idq and link.data_id = data.id
//OPTIMIZE TABLE data, link, info
//