<?php

namespace App\Models;

use App\Core\GuildMember;
use App\Interfaces\BugSquasher;
use App\Traits\ToolsetTrait;

class BackendHunter extends GuildMember implements BugSquasher
{
    use ToolsetTrait;

    public function findBug(string $bugDescription): string
    {
        return "Discovered a logic error: $bugDescription" . PHP_EOL;
    }
}