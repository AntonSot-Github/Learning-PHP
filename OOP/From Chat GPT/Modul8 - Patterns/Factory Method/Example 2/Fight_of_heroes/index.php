<?php

if(file_exists(__DIR__ . "/vendor/autoload.php")){
    require_once __DIR__ . "/vendor/autoload.php";
}

use App\Heroes\HeroFactory;

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

print_r ($heroInBattle);

