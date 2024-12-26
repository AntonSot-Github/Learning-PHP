<?php
abstract class Shape {
    protected string $color;

    // Конструктор
    public function __construct(string $color) {
        $this->color = $color;
    }

    // Абстрактный метод: должен быть реализован в дочерних классах
    abstract public function calculateArea(): float;

    // Обычный метод
    public function getColor(): string {
        return $this->color;
    }
}

// Дочерний класс Circle
class Circle extends Shape {
    private float $radius;

    public function __construct(string $color, float $radius) {
        parent::__construct($color);
        $this->radius = $radius;
    }

    // Реализация абстрактного метода
    public function calculateArea(): float {
        return pi() * pow($this->radius, 2);
    }
}

// Дочерний класс Rectangle
class Rectangle extends Shape {
    private float $width;
    private float $height;

    public function __construct(string $color, float $width, float $height) {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
    }

    // Реализация абстрактного метода
    public function calculateArea(): float {
        return $this->width * $this->height;
    }
}

// Использование
$circle = new Circle('red', 5);
echo 'Circle Area: ' . $circle->calculateArea(); // Circle Area: 78.539816339745

$rectangle = new Rectangle('blue', 4, 6);
echo 'Rectangle Area: ' . $rectangle->calculateArea(); // Rectangle Area: 24
