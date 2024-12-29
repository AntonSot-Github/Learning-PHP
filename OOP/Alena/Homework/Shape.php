<?php

class Shape 
{
    public $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }

}

class Circle extends Shape
{
    public $radius;
    
    public function __construct($name, $radius)
    {
        parent::__construct($name);
        $this->radius = $radius;
    }

    public function calculateArea()
    {
        echo (M_PI * $this->radius ** 2), "\n";
    }
}

class Rectangle extends Shape
{
    public $width;
    public $height;

    public function __construct($name, $width, $height)
    {
        parent::__construct($name);
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea()
    {
        echo $this->width * $this->height, "\n";
    }
}

$circleA = new Circle("circleA", 5);
$circleA->calculateArea();

$circleB = new Circle("circleB", 12);
$circleB->calculateArea();

$rectangleA = new Rectangle("RectangleA", 4, 5);
$rectangleA->calculateArea();

$rectangleB = new Rectangle("RectangleB", 8, 9);
$rectangleB->calculateArea();
