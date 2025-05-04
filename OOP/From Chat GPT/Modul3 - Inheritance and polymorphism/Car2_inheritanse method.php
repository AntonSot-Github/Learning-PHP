<?php
/* 
Задание: Расширь Car, добавив метод move() с вызовом parent::move() внутри.
Пусть Vehicle::move() пишет "Транспорт движется", а Car::move() добавляет: "по шоссе".
*/

class Vehicle 
{
    public function move()
    {
        echo "Moving on" . PHP_EOL;
    }
}

class Car extends Vehicle
{
    public function move()    
    {
        parent::move();
        echo "the road" . PHP_EOL;
    }
}

$car = new Car();
$car->move();
