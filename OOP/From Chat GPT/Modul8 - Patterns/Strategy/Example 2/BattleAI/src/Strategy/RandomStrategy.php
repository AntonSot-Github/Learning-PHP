<?php

namespace App\Strategy;

use App\Strategy\BattleStrategy;

class RandomStrategy implements BattleStrategy
{
    public function execute(string $heroName):void
    {
        switch(rand(1, 3)){
            case 1: 
                echo "$heroName raises a magical shield and waits. \n";
                break;
            case 2: 
                echo "$heroName rushes into battle with fury! \n";
                break;
            case 3:
                echo "$heroName uses combat spell \n";
                break;
            default:
                echo "$heroName leave the battle \n";
        }
    }
}
