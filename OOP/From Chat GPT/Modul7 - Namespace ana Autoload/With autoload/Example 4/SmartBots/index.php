<?php

spl_autoload_register(function($class)
{
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . ".php";

    if(file_exists($path)){
        require_once $path;
    }
});

use Models\AnalystBot;
use Models\GuardianBot;
use Config\Settings;

echo "Name of Study-Station: " . Settings::LAB_NAME . PHP_EOL;

$analystBot = new AnalystBot("Cifrovichok");
$analystBot->identify();
echo $analystBot->processData("Student's hometask");
echo $analystBot->runDiagnostics();
                             
$guardianBot = new GuardianBot("Cifrovochok's doggi");
$guardianBot->identify();
echo $guardianBot->processData("Protection from silly questions.");
echo $guardianBot->runDiagnostics();
