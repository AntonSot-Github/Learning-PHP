<?php

if(file_exists(__DIR__ . "/vendor/autoload.php")){
    require_once __DIR__ . "/vendor/autoload.php";
}

use App\Classes\Builder;
use App\Classes\ConstructionManager;
use App\Classes\Driver;
use App\Classes\Excavator;

$builder = new Builder("Valentin", 10);
$driver = new Driver("Kuzia", 14);

$excavator = new Excavator();
echo $excavator->start();

$constructionManager = new ConstructionManager();

$constructionManager->assignWork($builder);
$constructionManager->assignWork($driver);




