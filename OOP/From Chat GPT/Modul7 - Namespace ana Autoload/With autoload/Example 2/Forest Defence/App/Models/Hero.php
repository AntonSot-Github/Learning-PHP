<?php
namespace App\Models;

abstract class Hero 
{
    protected string $name;

    public function __construct(string $name) 
    {
        $this->name = $name;
    }

    abstract public function getRole(): string;
}
