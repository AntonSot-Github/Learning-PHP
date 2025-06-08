<?php

namespace Models;

use Core\Robot;
use Interfaces\IntelligenceUnit;
use Traits\DiagnosticsTrait;

class AnalystBot extends Robot implements IntelligenceUnit
{
    use DiagnosticsTrait;

    public function processData(string $input): string
    {
        return "Analyzing data: $input" . PHP_EOL;
    }
}