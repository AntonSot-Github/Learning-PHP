<?php

/* 
Сделай абстрактный класс Employee:

Свойства: name, position

Метод __construct()

Абстрактный метод calculateSalary()

Создай два класса:

Manager, у которого зарплата — фикс + бонус (передаётся в конструктор)

Developer, у которого зарплата — ставка за день × количество дней

Добавь интерфейс Payable с методом pay(). Реализуй его в обоих классах и в методе pay() вызывай calculateSalary() и выводи имя + сумму.

Сделай массив сотрудников, вызови pay() у каждого.
 */

interface Payable
{
    public function pay();
}

abstract class Employee 
{
    public $name;
    public $position;

    public function __construct($name, $position)
    {
        $this->name = $name;
        $this->position = $position;
    }

    abstract function calculateSalary();
}

class Manager extends Employee implements Payable
{
    public $fixPart = 1500;
    public $bonus;

    public function __construct($name, $position, $bonus)
    {
        parent::__construct($name, $position);
        $this->bonus = $bonus;
    }

    public function calculateSalary()
    {
        return $this->fixPart + $this->bonus;
    }

    public function pay()
    {
        echo "{$this->name} ({$this->position}) - " . "{$this->calculateSalary()}$"  . PHP_EOL;
    }
}

class Developer extends Employee implements Payable
{
    public $salaryDay = 350;
    public $quantityDays;

    public function __construct($name, $position, $quantityDays)
    {
        parent::__construct($name, $position);
        $this->quantityDays = $quantityDays;
    }

    public function calculateSalary():int
    {
        return $this->salaryDay * $this->quantityDays;
    }

    public function pay()
    {
        echo "{$this->name} ({$this->position}) - " . "{$this->calculateSalary()}$" . PHP_EOL;
    }
}

$employees = [
    $lena = new Manager("Lena", "Manager", 170),
    $valentin = new Developer("Valentin", "Developer", 28),
    $tolyk = new Developer("Tolyk", "Developer", 23),
    $victor = new Manager("Victor", "Manager", 150),
];

foreach ($employees as $employee){
    $employee->pay();
}
