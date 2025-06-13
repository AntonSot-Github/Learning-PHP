<?php

namespace App\Controller;

use App\Model\Elephant;
use App\Model\Keeper;
use App\Service\ZooManager;

class ZooController
{
    public function run()
    {
        $elephant = new Elephant("Tiny Geshyk");

        $keeper = new Keeper("Brave Fedor");

        $zooManager = new ZooManager();

        $zooManager->assignKeeper($keeper, $elephant, "parrot");
    }
}
