<?php

namespace App\Battle;

use App\Heroes\HeroFactory;
use App\Strategies\AggressiveStrategy;
use App\Strategies\DefensiveStrategy;
use App\Strategies\RandomStrategy;

class Battle
{
    public int $roundsQuantity;

    public function __construct($roundsQuantity)
    {
        $this->roundsQuantity = $roundsQuantity;
    }

    public function fight()
    {
        $heroes = ["Archer", "Mage", "Warrior"];

        $randHeroes = [];
        while (count($randHeroes) < 2){
            $randNumber = rand(0, count($heroes) - 1);
            if(!in_array($heroes[$randNumber], $randHeroes)){
                $randHeroes[] = $heroes[$randNumber];
            }
        }

        $heroInBattle = [];

        foreach($randHeroes as $hero){
            $heroInBattle[] = HeroFactory::createHero($hero);
        }

        [$hero1, $hero2] = $heroInBattle;

        $strategies = [
            AggressiveStrategy::useAgrStat(), 
            DefensiveStrategy::useDefStrat(), 
            RandomStrategy::useRandStrat(),
        ];

        for($i = 1; $i <= $this->roundsQuantity; $i++){
            $stratForHero1 = $strategies[rand(0, 2)];
            echo "Round $i:" . PHP_EOL;
            echo "{$hero1->name} attacks {$hero2->name} for " . 
                $hero1->attack() + $stratForHero1 . " damage (Strategy: ) \n";

            $stratForHero2 = $strategies[rand(0, 2)];
            echo "{$hero2->name} attacks {$hero1->name} for " . 
                $hero2->attack() + $stratForHero2 . " damage (Strategy: ) \n";
        }
    }
}


