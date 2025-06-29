<?php

namespace App\Heroes;

use App\Heroes\HeroInterface;
use App\Strategies\BattleStrategyInterface;

abstract class Hero implements HeroInterface
{
    public string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}
