<?php

namespace Classes\Traits;

trait MagicLogger
{
    public function log(string $msg): void
    {
        echo "[MAGIC LOG]: $msg" . PHP_EOL;
    }
}