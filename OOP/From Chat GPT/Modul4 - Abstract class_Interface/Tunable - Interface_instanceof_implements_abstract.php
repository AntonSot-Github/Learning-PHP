<?php

/* 
Задание: "Джаз-бенд собирается"

Создай интерфейс Playable с методом play()
Создай интерфейс Tunable с методом tune()
Создай абстрактный класс BandInstrument с полем $name и конструктором

Создай классы-наследники:
Saxophone — реализует и Playable, и Tunable
DrumSet — реализует только Playable

В Saxophone::tune() напиши: "🎷 $name настраивается..." В Saxophone::play() напиши: "🎷 $name играет джаз!"
В DrumSet::play() напиши: "🥁 $name задаёт ритм!"

Напиши функцию:
function startConcert(Playable $instrument)
Внутри неё:
Если инструмент также Tunable, вызови tune()
Затем обязательно вызови play()

Создай массив с разными инструментами и вызови startConcert() на каждом из них.
*/


interface Tunable
{
    function tune();
}

interface Playable
{
    function play();
}

abstract class BandInstrument
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Saxophone extends BandInstrument implements Tunable, Playable
{
    public function tune()
    {
        echo "{$this->name} is tuning" . PHP_EOL;
    }

    public function play()
    {
        echo "{$this->name} plays Juzz" . PHP_EOL;
    }
}

class DrumSet extends BandInstrument implements Playable
{
    public function play()
    {
        echo "{$this->name} sets the rhythm!" . PHP_EOL;
    }
}

function startConcert(Playable $instrument)
{
    if ($instrument instanceof Tunable){
        $instrument->tune();
    }

    $instrument->play();
}

$instruments = [
    $saxoPipe = new Saxophone("Saxopipe"),
    $drumBoom = new DrumSet("Drumboom"),
];

foreach ($instruments as $instrument){
    startConcert($instrument);
}
