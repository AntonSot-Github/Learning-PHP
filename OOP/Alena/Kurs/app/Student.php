<?php

namespace App;

class Student extends Person
{
    private $univer;

    public function __construct($name, $age)
    {
        parent::__construct($name, $age);
    }

    public function greet()
    {
        echo "Hallo! I am student", "\n";
        return $this->protectedProperty;
    }

    public function getUniver()
    {
        return $this->univer;
    }

    public function setUniver($univer)
    {
        $this->univer = $univer;
    }

    public function introduce()
    {
        return "Hello! I am student " . $this->getUniver();
    }
}