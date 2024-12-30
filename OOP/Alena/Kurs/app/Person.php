<?php

namespace App;

abstract class Person 
{
    protected $name;
    protected $age;

    protected $protectedProperty = "Protected property";

    public abstract function introduce();
    
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}