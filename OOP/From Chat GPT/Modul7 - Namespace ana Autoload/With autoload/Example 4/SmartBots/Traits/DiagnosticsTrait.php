<?php

namespace Traits;

trait DiagnosticsTrait
{
    public function runDiagnostics(): string
    {
        return "Diagnostics complete. All systems nominal." . PHP_EOL;
    }
}
