<?php

spl_autoload_register(function($class) 
{
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($path)) {
        require $path;
    }
});

use App\Models\User;
use App\Models\Product;

$user = new User("user@mail.com");
echo $user->getEmail() . PHP_EOL;

$product = new Product("Laptop");
echo $product->getName() . PHP_EOL;
$product->log("It's flagman among the all offers");