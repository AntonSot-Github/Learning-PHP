<?php

namespace App\Strategy;

interface BattleStrategy
{
    public function execute(string $heroName): void;
}
