<?php

namespace App\Strategy;

use App\Strategy\BattleStrategy;

class DefensiveStrategy implements BattleStrategy
{
    public function execute(string $heroName):void
    {
        echo "$heroName raises a magical shield and waits. \n";
    }
}
