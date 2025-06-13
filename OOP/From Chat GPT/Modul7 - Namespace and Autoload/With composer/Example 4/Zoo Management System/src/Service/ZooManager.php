<?php

namespace App\Service;

use App\Model\Keeper;
use App\Traits\Logger;
use App\Interfaces\Feedable;

class ZooManager
{
    use Logger;

    public function assignKeeper(Keeper $keeper, Feedable $animal, string $food)
    {
        echo $this->log($keeper->feedAnimal($animal, $food));
    }
}


