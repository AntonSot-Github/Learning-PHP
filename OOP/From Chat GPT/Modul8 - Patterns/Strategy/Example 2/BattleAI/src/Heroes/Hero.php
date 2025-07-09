<?php

namespace App\Heroes;

use App\Strategy\BattleStrategy;

class Hero
{
    public string $name;
    public $strategy;

    public function __construct($name, BattleStrategy $strategy)
    {
        $this->name = $name;
        $this->strategy = $strategy;
    }

    public function setStrategy(BattleStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function fight(): void
    {
        $this->strategy->execute($this->name);
    }
}
