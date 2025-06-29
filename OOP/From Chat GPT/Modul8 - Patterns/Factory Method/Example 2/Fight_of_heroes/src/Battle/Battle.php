<?php

namespace App\Battle;

use App\Heroes\HeroFactory;

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
    }
}


