<?php

class User 
{
    private $userName;
    private $email;
    private $password;

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName)
    {
        if(is_string($userName) && $userName != ""){
            $this->userName = $userName;
        } else {
            echo "incorrect form of name", "\n";
        }
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        if(is_string($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->email = $email;
        } else {
            echo "incorrect email", "\n";
        }
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        if(is_string($password) && strlen($password) > 6){
            $this->password = $password;
        } else {
            echo "incorrect password", "\n";
        }
    }
}

$ivan = new User();
$ivan->setUserName("Ivan");
echo $ivan->getUserName();

$ivan->setEmail("ivan23@gmail.com");
echo $ivan->getEmail();

$ivan->setPassword("45thuyb");
echo $ivan->getPassword();