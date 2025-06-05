<?php

spl_autoload_register(function ($class) 
{
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

use App\Models\TreeGuardian;
use App\Spells\NaturePower;

$guardian = new TreeGuardian("Willow");
$guardian->defend();

echo NaturePower::cast();
