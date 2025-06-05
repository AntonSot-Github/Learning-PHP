<?php

namespace App\Spells;

class NaturePower 
{
    public const POWER = "Photosynthesis Ray";

    public static function cast(): string 
    {
        return "Casting: " . self::POWER;
    }
}
