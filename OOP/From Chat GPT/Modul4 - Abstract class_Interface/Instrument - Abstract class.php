<?php

/* 
Создай абстрактный класс Instrument, который содержит:

свойство $name,

метод __construct($name),

абстрактный метод play().

Создай два класса-наследника:

Guitar, в котором play() выводит: "🎸 $name играет рок!",

Piano, в котором play() выводит: "🎹 $name исполняет классику!".

Создай массив с разными инструментами, пройдись по нему и вызови play() у каждого.
 */

abstract class Instrument
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    abstract public function play();
}

class Guitar extends Instrument
{
    public function play()
    {
        echo "🎸{$this->name} plays rock! \n";
    }
}

class Piano extends Instrument 
{
    public function play()
    {
        echo "🎹 {$this->name} plays classic! \n";
    }
}

$instruments = [
    $guitar = new Guitar("Bob"),
    $piano = new Piano("Rob"),
];

foreach ($instruments as $instrument){
    $instrument->play();
}
