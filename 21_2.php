<?php

/**
 * мій клас
 * 
 * тут міститься опис класу))
 * 
 * @author Невмержицький
 * @version 1.0 
 */
final class init {

    protected static $_instance;  //екземпляр обєкта

    public static function getInstance() { // получити екземпляр даного класа 
        if (self::$_instance === null) { // якщо екземпляр даного класу  не ств.
            self::$_instance = new self;  // створюєм екземпляр даного класу 
        }
        return self::$_instance; // повертаєм екземпляр даного класу
    }

    private function __construct() { // конструктор відпрацьовує один раз при init::getInstance();
        try {
            $this->connect = mysql_connect('localhost', 'root', '') or die("Не можливо  встановити зєднання" . mysql_error());
            mysql_select_db('db_name', $this->connect) or die("не можливо вибрати вказану базу" . mysql_error());
            $this->create();
            $this->fill();
        } catch (Exception $e) {
            echo 'Исключение: ', $e->getMessage();
        }
    }

    private function __clone() { //запрещаем клонирование объекта модификатором private
    }

    /**
     * метод створення таблиці
     * 
     * @return void
     */
    private function create() {

        $tb_test = mysql_query("CREATE TABLE IF NOT EXISTS `test`(
             `id` int(5) NOT NULL auto_increment,
             `script_name` varchar(25) NOT NULL,
             `start_time` int(5) NOT NULL,
             `end_time` int(5) NOT NULL,
             `result` enum('normal', 'illegal', 'failed', 'success'),
             PRIMARY KEY (`id`))");
        if (!$tb_test) {
            throw new Exception('table is not create');
        }
    }

    /**
     * метод заповнення таблиці випадковими значеннями
     * 
     * @return void
     */
    private function fill() {
        $mass[1] = 'normal';
        $mass[2] = 'illegal';
        $mass[3] = 'failed';
        $mass[4] = 'success';
        for ($i = 0; $i <= mt_rand(1, 5); $i++) {
            $script_name = uniqid();
            $start_time = time() - 10000;
            $end_time = time() - 5000;
            $result = $mass[mt_rand(1, 4)];
            $tb_input = mysql_query("INSERT INTO `test` (`script_name`,`start_time`,"
                    . "`end_time`,`result`) VALUES ('$script_name', '$start_time',"
                    . "'$end_time','$result')");
        }
        if (!$tb_input) {
            throw new Exception('you not insert something into table');
        }
    }

    /**
     * метод класа для вибору полів по параметру 
     * 
     * @return масив вибрані строки таблиці
     */
    public function get() {
        if (isset($this->connect)) {
            $change = mysql_query("SELECT * FROM `test` WHERE `result` IN('normal','success')");
            while ($tb_results = mysql_fetch_array($change, MYSQL_ASSOC)) {
                print_r($tb_results);
                echo '<br>';
            }
        }  else die("not connect");
    }

}

$init = init::getInstance();
$init->get();
