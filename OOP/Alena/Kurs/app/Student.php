<?php

namespace App;

class Student extends Person implements Info, InfoAge 
{
    use Education;
    public static $studentCounter = 0;

    private $univer;

    public function __construct($name, $age)
    {
        parent::__construct($name, $age);
        self::$studentCounter++;
    }

    public static function getStudenCounter()
    {
        return self::$studentCounter;
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

    public function howOld()
    {
        return $this->age . " years old";
    }
}