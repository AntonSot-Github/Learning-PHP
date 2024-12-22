<?php

namespace App;

class Visitor
{
    //Фиксированные значения - свойства класса
    public string $name;
    public int $age;
    public array $hours;
    
    //Функции - методы класса
    public function visit()
    {
        print_r ("I'm visiting");
    }

}