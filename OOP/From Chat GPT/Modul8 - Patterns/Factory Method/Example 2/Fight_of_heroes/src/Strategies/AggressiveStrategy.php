<?php

namespace App\Strategies;

class AggressiveStrategy
{
    public static $strategyName = "Agressive";

    public function agressiveStrategy():int
    {
        return 5;
    }

    public static function useAgrStat()
    {
        $agrObj = new self();
        return $agrObj->agressiveStrategy();
    }
}
