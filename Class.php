<?php

class MyClass
{
    public string $var = 'default value';

    public function __construct($test)
    {
        $this->var = $test;
    }

    public function displayVar() 
    {
        echo $this->var;
    }
}

$a = new MyClass('Object 1');
$a2 = new MyClass('Object 2');

var_dump($a, $a2);

//Вызов свойства
var_dump($a->var);
var_dump($a2->var);

//Вызов метода
var_dump($a->displayVar());





