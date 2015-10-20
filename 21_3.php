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
            $this->pdo = new PDO('mysql:dbname=db_name;host=localhost', 'root', '');
            $this->create();
            $this->fill();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
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
        try {
            $tb_test = $this->pdo->exec("CREATE TABLE IF NOT EXISTS `test`(
             `id` int(5) NOT NULL auto_increment,
             `script_name` varchar(25) NOT NULL,
             `start_time` int(5) NOT NULL,
             `end_time` int(5) NOT NULL,
             `result` enum('normal', 'illegal', 'failed', 'success'),
             PRIMARY KEY (`id`))");
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    /**
     * метод заповнення таблиці випадковими значеннями
     * 
     * @return void
     */
    private function fill() {
        try {
            $mass = array('0', 'normal', 'illegal', 'failed', 'success');
            for ($i = 0; $i <= mt_rand(1, 5); $i++) {
                $script_name = uniqid();
                $start_time = time() - 10000;
                $end_time = time() - 5000;
                $result = $mass[mt_rand(1, 4)];
                $tb_input = $this->pdo->exec("INSERT INTO `test` (`script_name`,`start_time`,"
                        . "`end_time`,`result`) VALUES ('$script_name', '$start_time',"
                        . "'$end_time','$result')");
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    /**
     * метод класа для вибору полів по параметру 
     * 
     * @return масив вибрані строки таблиці
     */
    public function get() {
        try {
            $change = $this->pdo->query("SELECT * FROM `test` WHERE `result` IN('normal','success')");
            while ($tb_results = $change->fetch(PDO::FETCH_ASSOC)) {
                print_r($tb_results);
                echo '<br>';
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

}

//$new= new init();//ми закрили доступ до зовн. використання конструктора
//відповідно через оператор new обєкти не створюються
//$new2= new init();//аналогічно
//щоб створити обєкт і викликати конструктор init::getInstance();
$init = init::getInstance();
$init->get();