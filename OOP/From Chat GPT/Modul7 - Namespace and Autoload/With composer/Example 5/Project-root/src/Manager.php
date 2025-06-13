<?php

namespace App;

use App\Traits\Logger;
use App\Interfaces\Workable;
use App\Workers\Worker;

class Manager
{
    use Logger;

    public function assignWork(Workable $worker): void
    {
        echo $this->log("{$worker->work()}");

        if($worker instanceof Worker){
            $this->log("{$worker->getInfo()}");
        }
    }
}
