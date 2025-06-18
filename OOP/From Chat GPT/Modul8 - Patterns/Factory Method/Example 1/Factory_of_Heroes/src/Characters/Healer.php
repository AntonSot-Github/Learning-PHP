<?php

namespace App\Characters;

use App\Characters\Hero;

class Healer implements Hero
{
    public function attack(): void
    {
        echo "Healer restores the ally health \n";
    }
}
