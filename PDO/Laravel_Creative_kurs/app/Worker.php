<?php

namespace App;// Определяем пространство имен для класса, чтобы избежать конфликтов с другими классами в проекте.

abstract class Worker 
{
    // Фиксированные значения - свойства класса
    public string $name; // Имя работника (строка)
    public int $age; // Возраст работника (целое число)
    public array $hours; // Рабочие часы (массив)

    protected string $position; // Доступность только в самом классе и наследниках

    private string $positionInFuture; // Доступность только внутри данного класса

    // Конструктор класса. Вызывается при создании объекта Worker.
    public function __construct($name, $age, $hours)
    {
        // Присваиваем переданные значения свойствам объекта.
        $this->name = $name; // Устанавливаем значение имени
        $this->age = $age; // Устанавливаем значение возраста
        $this->hours = $hours; // Устанавливаем рабочие часы
    }

    // Функция work - метод класса, который выполняет определенное действие.
    public function work()
    {
        // Выводит текст, обозначающий, что работник работает.
        print_r("I'm working");
    }

    //Сеттер
    public function setPositionInFuture($value)
    {
        $this->positionInFuture = $value;
    }

    //Геттер
    public function getPositionInFuture(): string
    {
        return $this->positionInFuture;
    }
}
