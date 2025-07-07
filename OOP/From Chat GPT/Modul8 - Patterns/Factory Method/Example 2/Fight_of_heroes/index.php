<?php

if(file_exists(__DIR__ . "/vendor/autoload.php")){
    require_once __DIR__ . "/vendor/autoload.php";
}

use App\Heroes\HeroFactory;
use App\Battle\Battle;

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



$battle1 = new Battle(3);

$battle1->fight();
