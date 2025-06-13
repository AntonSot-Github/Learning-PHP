<?php

namespace App\Interfaces;

interface Feedable
{
    public function eat(string $food): string;
}