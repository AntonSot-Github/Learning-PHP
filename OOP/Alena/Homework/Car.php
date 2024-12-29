<?php

class Car 
{
    public $brand;
    protected $model;
    private $year;

    public function __construct($brand, $model, $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }
}

$car1 = new Car("BMW", "512", 2000);
echo $car1->brand;
//echo $car1->model;
echo $car1->year;