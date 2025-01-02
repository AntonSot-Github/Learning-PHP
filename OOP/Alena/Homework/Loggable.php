<?php

trait Loggable 
{
    public function log($message)
    {
        echo $message;
    }

}

class User
{
    use Loggable;

    public function register($userName, $email)
    {
        if (is_string($userName) && !empty($email)){
            $this->log("The user is successfully registered");
        } else {
            $this->log("error 404");
        }
    }
}



$user = new User();
$user->register("Gena", "gena@gmail.com");
