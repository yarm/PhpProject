<?php
class main {

private $activated;

function __construct(){ $this->set_activated();}

function set_activated(){

$this->activated='$$$';

}

function show_main(){

if (isset($this->activated)){

echo 'your content main';

}

}

}


class testing extends main{

function __construct(){ parent:: __construct();}

function show_testing(){

if (isset($this->activated)){

echo 'your content testing';

}

}

}


$n = new main();

$n->show_main();

echo '<br>-------------------<br>';

$n = new testing();

$n->show_testing();
?>