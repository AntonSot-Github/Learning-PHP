<?php

namespace Classes\Entities;

abstract class Wizard
{
    protected string $name;
    protected int $mana;

    public function __construct($name, $mana)
    {
        $this->name = $name;
        $this->mana = $mana;
    }

    abstract public function getTitle(): string;

    public function getName()
    {
        return $this->name;
    }

}




