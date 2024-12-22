<?php 

namespace App;

class Developer extends Worker
{
    public function work()
    {
        print_r("I'm developing");
    }
}