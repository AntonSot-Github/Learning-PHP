<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Workers\Designer;
use App\Workers\Developer;
use App\Workers\Intern;
use App\Manager;
use App\Robot;

$designer = new Designer("Vasjutka", 5);
$developer = new Developer("Vanjushka" , 7);
$intern = new Intern("Veniamin Iziaslavovich", 64);
$manager = new Manager();
$robot = new Robot();

$manager->assignWork($designer);
$manager->assignWork($developer);
$manager->assignWork($intern);
$manager->assignWork($robot);