<?php
//визначення класу
class main {
//властивість класу
    private $activated;
//метод 
//конструктор 
function __construct(){ 
    //конструктор. для властивості activated втановлює значення '$$$'
    //через метод set_activated
    $this->set_activated();}
//метод
function set_activated(){
//присвоєння члену класу значення '$$$'
$this->activated='$$$';

}
//метод
//якщо для властивості activated встановлено значення виводить
//'your content main'
function show_main(){

if (isset($this->activated)){

echo 'your content main';

}

}

}
//дочірній клас класу мейн
class testing extends main{
//викликаємо метод конструктор батьківського класу
 
    function __construct(){ parent:: __construct();}
//метод (якщо для властивості втановлено значення то виводимо 'your content testing')
function show_testing(){
    
if (isset($this->activated)){

echo 'your content testing';

}

}

}
//створюємо обєкт класу мейн
//з ініціалізованою конструктором властивістю '$$$'
$n = new main();
//на обєкт діємо методом show_main()
//виводиться 'your content main'
$n->show_main();
//виводяться дефіси
echo '<br>-------------------<br>';
//створюємо обєкт класу тестінг
$n = new testing();
//на обєкт діємо методом show_testing()
//так як для нього властивість activated закрита,то метод не діє на обєкт
$n->show_testing();

