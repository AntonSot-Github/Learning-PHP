<?php

namespace App\Classes;

use App\Classes\Worker;
use App\Interfaces\Workable;

class Builder extends Worker implements Workable
{
    public function work():string
    {
        return "Worker {$this->getName()} with experiens {$this->getExperiens()} years builds a house" . PHP_EOL;
    }
}
