<?php

namespace App\Characters;

use App\Characters\Hero;

class Warrior implements Hero
{
    public function attack(): void
    {
        echo "Warrior attacks with sword \n";
    }
}
