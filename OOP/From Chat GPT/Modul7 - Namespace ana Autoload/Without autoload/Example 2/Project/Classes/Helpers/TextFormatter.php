<?php

namespace Classes\Helpers;

class TextFormatter 
{
    public static function formatName(string $name): string
    {
        return ucfirst(trim($name)) . PHP_EOL;
    }
}