<?php

namespace App\Core;

abstract class GuildMember
{
    public string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function introduce()
    {
        echo "I am $this->name from the Bug Hunters Guild." . PHP_EOL;
    }
}
