<?php

namespace App;

class Person 
{
    public $name;
    public $age;

    protected $protectedProperty = "Protected property";


    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}