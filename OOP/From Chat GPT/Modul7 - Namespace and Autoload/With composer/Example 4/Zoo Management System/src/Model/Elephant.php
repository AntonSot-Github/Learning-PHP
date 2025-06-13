<?php

namespace App\Model;

use App\Interfaces\Feedable;

class Elephant extends Animal implements Feedable
{
    public function makeSound(): string
    {
        return "{$this->getName()} blows its trunk" . PHP_EOL;
    }

    public function eat(string $food): string
    {
        return "{$this->getName()} eats $food" . PHP_EOL;
    }
}
