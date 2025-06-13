<?php

namespace App\Classes;

use App\Traits\Logger;
use App\Interfaces\Workable;

class ConstructionManager
{
    use Logger;

    public function assignWork(Workable $worker)
    {
        $result = $worker->work();
        $this->log($result);
    }
}
