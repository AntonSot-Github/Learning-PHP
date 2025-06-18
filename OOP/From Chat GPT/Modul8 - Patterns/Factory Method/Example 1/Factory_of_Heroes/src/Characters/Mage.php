<?php

namespace App\Characters;

use App\Characters\Hero;

class Mage implements Hero
{
    public function attack(): void
    {
        echo "Mage creates fire-ball \n";
    }
}
