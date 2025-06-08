<?php

namespace Models;

use Core\Robot;
use Interfaces\IntelligenceUnit;
use Traits\DiagnosticsTrait;

class GuardianBot extends Robot implements IntelligenceUnit
{
    use DiagnosticsTrait;

    public function processData(string $input): string
    {
        return "Threat assessment: $input" . PHP_EOL;
    }
}
