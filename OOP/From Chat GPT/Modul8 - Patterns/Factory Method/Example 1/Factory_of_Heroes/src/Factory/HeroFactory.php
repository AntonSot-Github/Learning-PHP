<?php

namespace App\Factory;

use App\Characters\Healer;
use App\Characters\Mage;
use App\Characters\Warrior;
use InvalidArgumentException;// Подключаем встроенный класс исключения
//InvalidArgumentException — это стандартный класс исключений PHP (входит в глобальное пространство имен)

class HeroFactory
{
    public static int $heroCount = 0;

    public static function createHero(string $hero): Warrior | Mage | Healer
    {
        self::$heroCount++;
        return match($hero){
            'Healer' => new Healer(),
            'Mage' => new Mage(),
            'Warrior' => new Warrior(),
            default => throw new InvalidArgumentException("Unknown hero type: {$hero}")
        };
    }

    public static function getHeroCount()
    {
        return self::$heroCount;
    }
}
