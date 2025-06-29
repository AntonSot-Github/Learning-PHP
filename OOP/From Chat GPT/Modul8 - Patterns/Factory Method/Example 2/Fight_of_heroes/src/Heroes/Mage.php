<?php

namespace App\Heroes;

use App\Heroes\Hero;


class Mage extends Hero
{
    public function getName(): string
    {
        return $this->name;
    }

    public function attack(): int
    {
        return rand(5, 25);
    }
}