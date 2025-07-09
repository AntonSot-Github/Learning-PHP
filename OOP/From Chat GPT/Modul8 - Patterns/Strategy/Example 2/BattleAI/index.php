<?php

if(file_exists(__DIR__ . "/vendor/autoload.php")){
    require_once __DIR__ . "/vendor/autoload.php";
}

use App\Heroes\Hero;
use App\Battle\Battle;
use App\Strategy\AggressiveStrategy;
use App\Strategy\DefensiveStrategy;
use App\Strategy\RandomStrategy;

$heroes1 = array(new Hero("Fedia", new AggressiveStrategy()), new Hero("Lorcik", new DefensiveStrategy()), new Hero("Kuzia", new RandomStrategy()));
Battle::start($heroes1);

$heroes2 = array(new Hero("Fedia", new RandomStrategy()), new Hero("Lorcik", new RandomStrategy()), new Hero("Kuzia", new RandomStrategy()));
Battle::start($heroes2);
