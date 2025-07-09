<?php

namespace App\Strategy;

use App\Strategy\BattleStrategy;

class AggressiveStrategy implements BattleStrategy
{
    public function execute(string $heroName):void
    {
        echo "$heroName rushes into battle with fury! \n";
    }
}
