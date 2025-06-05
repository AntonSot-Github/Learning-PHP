<?php

namespace App\Models;

spl_autoload_register(function ($className) {
    $path = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    
    if (file_exists($path)) {
        require_once $path;
    }
     echo $path;
});

use App\Contracts\Defendable;
use App\Traits\LoggerTrait;

class TreeGuardian extends Hero implements Defendable 
{
    use LoggerTrait;

    public function getRole(): string 
    {
        return "Tree Guardian";
    }

    public function defend(): void 
    {
        $this->log("{$this->name} is defending the forest!");
    }
}
