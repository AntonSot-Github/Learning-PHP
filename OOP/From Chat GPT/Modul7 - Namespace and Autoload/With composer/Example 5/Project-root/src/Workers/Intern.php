<?php

namespace App\Workers;

use App\Workers\Worker;
use App\Interfaces\Workable;

class Intern extends Worker implements Workable
{
    public function work(): string
    {
        return "I'm $this->name, just intern, study to be someone helpful for our team";
    }
}
