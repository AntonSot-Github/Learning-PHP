<?php

spl_autoload_register(function ($class) {
    $path = __DIR__ . "/" . str_replace("\\", "/", $class) . ".php";

    if(file_exists($path)){
        require_once $path;
    }
});

use App\Models\FrontendHunter;
use App\Models\BackendHunter;
use App\Config\Constants;

echo "Version of Software: " . Constants::VERSION . PHP_EOL;

$frontendHunter = new FrontendHunter("FrontMicha");
$frontendHunter->introduce();
echo $frontendHunter->findBug("Underfined button");
echo $frontendHunter->useTool("axe");

$backendHunter = new BackendHunter("UncleProger");
$backendHunter->introduce();
echo $backendHunter->findBug("Сatastrophe!!! No connection with ChatGPT!");
echo $backendHunter->useTool("Scotch and glue");