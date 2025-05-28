<?php

namespace Classes\Models;

require_once __DIR__ .  "/User.php";
require_once __DIR__ . "/../../Classes/Traits/LoggerTrait.php";
require_once __DIR__ . "/../../Classes/Interfaces/Deliverable.php";

use Classes\Models\User;
use Classes\Interfaces\Deliverable;
use Classes\Traits\LoggerTrait;

class Client extends User implements Deliverable
{
    use LoggerTrait;

    public function __construct(
        string $name,
        string $email,
        public string $adres)
    {
        parent::__construct($name, $email);
    }

    public function deliver(string $adres): void
    {
        echo "[LOG]: delivery to $adres" . PHP_EOL;
    }

    public function getRole():string
    {
        return "Client $this->name" . PHP_EOL;
    }
}

