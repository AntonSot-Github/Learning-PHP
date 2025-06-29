<?php

namespace App\Heroes;

use App\Heroes\Archer;
use App\Heroes\Mage;
use App\Heroes\Warrior;
use InvalidArgumentException;

class HeroFactory
{
    public static function createHero(string $hero): Warrior | Mage | Archer
    {
        return match($hero){
            'Archer' => new Archer("Arrow-master"),
            'Mage' => new Mage("Gendalf"),
            'Warrior' => new Warrior("Gerkules"),
            default => throw new InvalidArgumentException("Unknown hero type: {$hero}")
        };
    }
}
