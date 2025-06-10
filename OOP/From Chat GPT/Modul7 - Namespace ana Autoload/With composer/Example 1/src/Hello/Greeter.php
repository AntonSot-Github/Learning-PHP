<?php

namespace App\Hello;

class Greeter
{
    public function greet(string $name): void
    {
        echo "Привет, {$name}!" . PHP_EOL;
    }
}
