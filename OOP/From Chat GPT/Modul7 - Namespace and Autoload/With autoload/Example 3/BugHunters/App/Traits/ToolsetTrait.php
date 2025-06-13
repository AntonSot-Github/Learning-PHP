<?php

namespace App\Traits;

trait ToolsetTrait
{
    public function useTool(string $tool): string
    {
        return "Using tool: $tool" . PHP_EOL;
    }
}
