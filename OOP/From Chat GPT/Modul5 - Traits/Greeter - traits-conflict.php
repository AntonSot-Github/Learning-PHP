<?php

/* 
Задание 3 (на конфликт)
Создай два трейта:

FirstTrait с методом greet() — выводит "Hi from First"

SecondTrait с методом greet() — выводит "Hi from Second"

Создай класс Greeter, используй оба трейта. Разреши конфликт:

greet() пусть будет из SecondTrait

greetFromFirst() — псевдоним на метод из FirstTrait
*/

trait FirstTrait
{
    public function greet()
    {
        echo "Hi from first \n";
    }
}

trait SecondTrait
{
    public function greet()
    {
        echo "Hi from second \n";
    }
}

class Greeter
{
    use FirstTrait, SecondTrait{
        SecondTrait::greet insteadof FirstTrait;
        FirstTrait::greet as greetFromFirst;
    }  
}

$greeter = new Greeter();
$greeter->greet();
$greeter->greetFromFirst();