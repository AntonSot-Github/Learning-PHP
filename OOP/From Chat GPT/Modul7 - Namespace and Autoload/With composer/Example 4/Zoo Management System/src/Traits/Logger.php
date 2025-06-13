<?php

namespace App\Traits;

trait Logger
{
    public function log(string $message): string
    {
        return "[LOG]: $message";
    }
}
