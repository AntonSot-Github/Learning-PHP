<?php

namespace App\Model;

use App\Interfaces\Feedable;

class Keeper
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function feedAnimal(Feedable $animal, string $food): string
    {
        return "Keeper {$this->name} feeds {$animal->eat($food)}" . PHP_EOL;
    }
}
