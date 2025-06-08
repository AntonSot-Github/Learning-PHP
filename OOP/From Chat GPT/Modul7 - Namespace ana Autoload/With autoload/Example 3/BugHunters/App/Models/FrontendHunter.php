<?php

namespace App\Models;

use App\Core\GuildMember;
use App\Interfaces\BugSquasher;
use App\Traits\ToolsetTrait;

class FrontendHunter extends GuildMember implements BugSquasher
{
    use ToolsetTrait;

    public function findBug(string $bugDescription): string
    {
        return "Found a CSS bug: $bugDescription" . PHP_EOL;
    }
}

