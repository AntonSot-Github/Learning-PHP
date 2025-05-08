<?php

/* 
Задание 1
Создай трейт Logger с методом log($message) — пусть он выводит [LOG]: сообщение.

Создай класс Order, подключи трейт и вызови логгирование при создании заказа.
*/

trait Logger 
{
    public function log($message)
    {
        echo "LOG: $message";
    }
}

class Order
{
    use Logger;
}

$order1 = new Order();
$order1->log("Brakfast, please");



