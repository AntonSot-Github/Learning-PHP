<?php

namespace App\Traits;

trait LoggerTrait 
{
    public function log(string $msg): void 
    {
        echo "[LOG] $msg" . PHP_EOL;
    }
}
