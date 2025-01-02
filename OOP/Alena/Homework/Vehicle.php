<?php

abstract class Vehicle
{
    public abstract function start();
    public abstract function stop();
}

class Car extends Vehicle
{
    public function start()
    {
        echo "Engine is started", "\n";
    }

    public function stop()
    {
        echo "Engine is stopped", "\n";
    }
    
}

class Bicycle extends Vehicle
{
    public function start()
    {
        echo "The bicycle is started moving", "\n";
    }

    public function stop()
    {
        echo "The bicycle is stopped", "\n";
    }
}

$car = new Car();
$car->start();
$car->stop();

$bicycle = new Bicycle();
$bicycle->start();
$bicycle->stop();
