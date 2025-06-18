<?php

if (file_exists(__DIR__ . "/vendor/autoload.php")){
    require_once __DIR__ . "/vendor/autoload.php";
}

use App\Factory\HeroFactory;

$heroes = array('Warrior', 'Mage', 'Healer');

foreach ($heroes as $hero){
    HeroFactory::createHero($hero)->attack();    
}

echo HeroFactory::getHeroCount();
