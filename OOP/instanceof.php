<?php

/* 
Упражнение 1: Служба доставки

У тебя есть классы:
class Package {}
class Box extends Package {}
class Envelope extends Package {}

И переменные:
$delivery1 = new Box();
$delivery2 = new Envelope();
$delivery3 = new stdClass();

➡️ Задание: Напиши функцию checkDeliveryType($item), которая:

Выводит "Коробка", если это Box;
"Конверт", если Envelope;
"Неизвестный тип", если что-то другое.
*/

//----- Task 1 -----

class Package {}
class Box extends Package {}
class Envelope extends Package {}

$delivery1 = new Box();
$delivery2 = new Envelope();
$delivery3 = new stdClass();

function checkDeliveryType($item)
{
    if($item instanceof Box){
        echo "Box" . PHP_EOL;
    } elseif ($item instanceof Envelope){
        echo "Envelope"  . PHP_EOL;
    } elseif ($item instanceof stdClass) {
        echo "Unknown type"  . PHP_EOL;
    }
}

checkDeliveryType($delivery1);
checkDeliveryType($delivery2);
checkDeliveryType($delivery3);

//----- Task 2 -----

/* 
Упражнение 2: Музей

Есть интерфейс и классы:
interface Exhibit {}
class Painting implements Exhibit {}
class Sculpture implements Exhibit {}
class Visitor {}

Задание: Напиши функцию describe($thing), которая:
Выводит "Это экспонат", если объект реализует Exhibit;
Иначе — "Это просто посетитель".
*/

interface Exhibit {};
class Painting implements Exhibit {};
class Sculpture implements Exhibit {};
class Visitor {};

function describe($thing)
{
    if ($thing instanceof Exhibit){
        echo "It's exhibit" . PHP_EOL;
    } else {
        echo "It's visitor" . PHP_EOL;
    }
}

$painting = new Painting();
$sculpture = new Sculpture();
$visitor = new Visitor();

describe($painting);
describe($sculpture);
describe($visitor);
