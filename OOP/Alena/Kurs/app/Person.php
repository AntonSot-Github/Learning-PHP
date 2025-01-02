<?php

namespace App;

abstract class Person 
{
    protected $name;
    protected $age;

    public static $counter = 0;

    protected $protectedProperty = "Protected property";

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
        self::$counter++;
    }

    public static function getCounter()
    {
        return self::$counter;
    }
}