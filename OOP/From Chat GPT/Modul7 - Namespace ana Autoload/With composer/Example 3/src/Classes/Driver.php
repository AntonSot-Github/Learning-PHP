<?php

namespace App\Classes;

use App\Classes\Worker;
use App\Interfaces\Workable;

class Driver extends Worker implements Workable
{
    public function work(): string
    {
        return "Driver {$this->getName()} with experiens {$this->getExperiens()} years manages the vehicles" . PHP_EOL;
    }
}
