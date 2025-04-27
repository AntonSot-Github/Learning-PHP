<?php

class Usercounter
{
    public static $counter = 0;

    public function __construct()
    {
        self::$counter++;
    }

    public static function getUserCounter()
    {
        return self::$counter;
    }


}

$userr1 = new Usercounter();
$user2 = new Usercounter();

echo Usercounter::getUserCounter();