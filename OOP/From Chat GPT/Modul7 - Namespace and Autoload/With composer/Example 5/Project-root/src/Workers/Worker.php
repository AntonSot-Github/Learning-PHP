<?php

namespace App\Workers;

abstract class Worker
{
    protected string $name;
    protected int $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getInfo(): string
    {
        return "$this->name, $this->age years old" . PHP_EOL;
    }
}
