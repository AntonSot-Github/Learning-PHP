<?php

namespace App\Traits;

trait Logger
{
    protected function log(string $message): void
    {
        echo "[LOG]: $message" . PHP_EOL;
    }
}
