<?php

namespace App;

trait Education
{
    protected $school;

    public function getSchool()
    {
        return $this->school;
    }

    public function setSchool($school) 
    {
        $this->school = $school;
    }
}