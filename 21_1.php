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

    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_name = 'db_name';
    private $db_table = 'test';
    
    /**
     *  встановлення підключення
     * 
     * @return true якщо зєднання встановлено 
     */
    private function connect() {
        $link = mysql_connect($this->db_host, $this->db_user, $this->db_pass);
        if (!$link) {
            die('Ошибка соединения: ' . mysql_error());
        }
    }

    private function sel_db() {

        $sel_db = mysql_select_db($this->db_name);
        if (!$sel_db) {
            throw new Exception('bd is not found');
        }
    }

    /**
     * метод створення таблиці
     * 
     * @return void
     */
    private function create() {
        $tb_test = mysql_query("CREATE TABLE IF NOT EXISTS $this->db_table(
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
            $tb_input = mysql_query("INSERT INTO $this->db_table (`script_name`,`start_time`,"
                    . "`end_time`,`result`) VALUES ('$script_name', '$start_time',"
                    . "'$end_time','$result')");
        }
        if (!$tb_input) {
            throw new Exception('you not insert something into table');
        }
    }

    public function __construct() {
        try {
            $this->connect();
            $this->sel_db();
            $this->create();
            $this->fill();
        } catch (Exception $e) {
            echo 'Выброшено исключение: ', $e->getMessage();
        }
    }

    /**
     * метод класа для вибору полів по параметру 
     * 
     * @return масив вибрані строки таблиці
     */
    public function get() {
        $change = mysql_query("SELECT * FROM $this->db_table WHERE `result` IN('normal','success')");
        while ($tb_results = mysql_fetch_array($change, MYSQL_ASSOC)) {
            print_r($tb_results);
            echo '<br>';
        }
    }
}
$obj = new init();
$obj->get();
