<?php

namespace App\Strategies;

class RandomStrategy
{
    public static $strategyName = "Random";

    public function randomStrategy():int
    {
        return rand(-5, 5);
    }

    public static function useRandStrat()
    {
        $objRandStrat = new self();
        return $objRandStrat->randomStrategy();
    }
}
