<?php

namespace App\Strategies;

class DefensiveStrategy
{
    public static $strategyName = "Defensive";

    public function DefensiveStrategy():int
    {
        return -3;
    }

    public static function useDefStrat()
    {
        $objDefStrat = new self();
        return $objDefStrat->DefensiveStrategy();
    }
}
