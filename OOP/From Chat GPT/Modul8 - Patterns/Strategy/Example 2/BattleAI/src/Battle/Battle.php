<?php

namespace App\Battle;

class Battle
{
    public static function start(array $heroes): void
    {
        foreach ($heroes as $hero){
            $hero->fight();
        }
    }
}