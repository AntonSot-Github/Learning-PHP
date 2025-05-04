<?php
/* 
Задание: Создай базовый класс Vehicle с методом move() (например, "движется по земле").
Создай 2 класса-наследника: Car и Boat.

Car должен переопределить move() (например: "едет по шоссе").

Boat — "плывёт по воде".
Создай массив из объектов Vehicle, Car, Boat и вызови у каждого move() в цикле.
*/

class Vehicle 
{
    public function move()
    {
        echo "Moving on the ground" . PHP_EOL;
    }
}

class Car extends Vehicle
{
    public function move()
    {
        echo "Moving on the road" . PHP_EOL;
    }
}

class Boat extends Vehicle
{
    public function move()
    {
        echo "Sail on water" . PHP_EOL;
    }
}

$objects = [
    $vehicle = new Vehicle(),
    $car = new Car(),
    $boat = new Boat(),
];

foreach($objects as $object){
    $object->move();
}

/* 
Задание: Расширь Car, добавив метод move() с вызовом parent::move() внутри.
Пусть Vehicle::move() пишет "Транспорт движется", а Car::move() добавляет: "по шоссе".
*/

