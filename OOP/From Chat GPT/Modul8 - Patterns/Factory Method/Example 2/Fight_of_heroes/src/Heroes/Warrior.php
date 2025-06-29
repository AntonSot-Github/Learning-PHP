<?php

namespace App\Heroes;

use App\Heroes\Hero;

class Warrior extends Hero
{
    public function getName(): string
    {
        return $this->name;
    }

    public function attack(): int
    {
        return rand(10, 15);
    }
}
