<?php

namespace App\Interfaces;

interface BugSquasher
{
    public function findBug(string $bugDescription): string;
}
