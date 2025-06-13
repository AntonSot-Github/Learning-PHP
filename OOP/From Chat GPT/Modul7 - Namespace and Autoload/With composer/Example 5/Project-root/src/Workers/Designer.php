<?php

namespace App\Workers;

use App\Workers\Worker;
use App\Interfaces\Workable;

class Designer extends Worker implements Workable
{
    public function work(): string
    {
        return "I'm $this->name, designer, make makets with help of Figma";
    }
}
