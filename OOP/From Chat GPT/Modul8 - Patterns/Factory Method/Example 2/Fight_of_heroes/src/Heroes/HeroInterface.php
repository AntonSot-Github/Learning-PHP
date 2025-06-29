<?php

namespace App\Heroes;

interface HeroInterface
{
    public function attack(): int;
    public function getName(): string;
}
