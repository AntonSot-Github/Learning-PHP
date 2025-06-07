<?php

namespace App\Models;

use App\Contracts\Defendable;
use App\Traits\LoggerTrait;

class TreeGuardian extends Hero implements Defendable 
{
    use LoggerTrait;

    public function getRole(): string 
    {
        return "Tree Guardian";
    }

    public function defend(): void 
    {
        $this->log("{$this->name} is defending the forest!");
    }
}
