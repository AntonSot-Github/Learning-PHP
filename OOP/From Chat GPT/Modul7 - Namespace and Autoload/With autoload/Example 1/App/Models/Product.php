<?php

namespace App\Models;

use App\Contracts\Loggable;

class Product implements Loggable
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function log(string $message): void
    {
        echo "Product log: {$message}" . PHP_EOL;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
