<?php

Class User
{
    public $name;
    protected $email;
    private $password;

    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function showInfo()
    {
        echo "name: $this->name, email: $this->email". PHP_EOL;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email):bool
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->email = $email;
            return true;
        } else {
            echo "Please, enter the email correctly" . PHP_EOL;
            return false;
        }
    }
}

$user1 = new User("Goga", "goga@mail.com", "12345");

$user1->showInfo();
//echo $user1->password;//PHP Fatal error:  Uncaught Error: Cannot access private property

$user1->setEmail("goga2@mail.com");
echo $user1->getEmail() . PHP_EOL;

$user1->setEmail("goga3mail");//Please, enter the email correctly
echo $user1->getEmail();//goga2@mail.com