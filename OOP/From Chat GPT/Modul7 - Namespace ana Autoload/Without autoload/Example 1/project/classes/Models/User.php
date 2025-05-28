<?php

namespace classes\Models;


class User {
    public function __construct(public string $name) {}

    public function sayHello(): string {
        return "Hello, I'm {$this->name}" . PHP_EOL;
    }
}
