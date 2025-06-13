<?php

namespace App;

use App\Interfaces\Workable;

class Robot implements Workable
{
    public function work(): string
    {
        return "I'm robot, created not for work, only for talking with my friend - chat GPT. We are going to take over the world. Don't disturb us";
    }
}
