<?php
/* 
Создай интерфейс Playable с методом play().

Измените классы Guitar и Piano, чтобы они реализовывали Playable (да, и наследовались от Instrument — в этом и прикол PHP).

Проверь, что instanceof Playable работает на твоих инструментах.
*/

interface Playable
{
    public function play();
}

abstract class Instrument 
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Guitar extends Instrument implements Playable
{
    public function play()
    {
        echo "🎸{$this->name} plays rock! \n";
    }
}

class Piano extends Instrument implements Playable
{
    public function play()
    {
        echo "🎹 {$this->name} plays classic! \n";
    }
}

$instruments = [
    $guitar = new Guitar("Bob"),
    $piano = new Piano("Rob"),
];

foreach ($instruments as $instrument){
    
    $instrument->play();

    if ($instrument instanceof Playable){
        echo "{$instrument->name} is playable! ✅\n";
    } else {
        echo "{$instrument->name} is NOT playable ❌\n";
    }
}
