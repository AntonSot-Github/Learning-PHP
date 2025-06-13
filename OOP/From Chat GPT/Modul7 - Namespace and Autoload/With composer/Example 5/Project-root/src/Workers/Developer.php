<?php

namespace App\Workers;

use App\Workers\Worker;
use App\Interfaces\Workable;

class Developer extends Worker implements Workable
{
    public function work(): string
    {
        return "I'm $this->name, developer, use at my work for programming languages PHP and JS";
    }
}
