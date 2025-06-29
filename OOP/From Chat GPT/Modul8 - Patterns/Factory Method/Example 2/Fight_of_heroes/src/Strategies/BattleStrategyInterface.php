<?php

namespace App\Strategies;

use App\Heroes\HeroInterface;

interface BattleStrategyInterface {
    public function execute(HeroInterface $hero): string;
}
