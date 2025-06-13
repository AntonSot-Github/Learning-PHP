<?php

namespace App\Classes;

abstract class Worker
{
    protected string $name;
    protected int $experiens;

    public function __construct($name, $experiens)
    {
        $this->name = $name;
        $this->experiens = $experiens;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getExperiens()
    {
        return $this->experiens;
    }

    abstract public function work();
}
