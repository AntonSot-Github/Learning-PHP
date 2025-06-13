<?php

namespace Classes\Traits;

trait LoggerTrait
{
    public function log(string $msg): void
    {
        echo $msg . PHP_EOL;
    }
}