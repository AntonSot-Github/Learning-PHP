<?php

interface Payable
{
    public function pay():void;
}

abstract class User
{
    protected string $name;
    protected string $email;
    protected int $id;

    public function __construct($name, $email, $id)
    {
        $this->name = $name;
        $this->email = $email;
        $this->id = $id;
    }

    public function __dsestruct()
    {
        echo "$this->name($this->id) is deleted from DB";
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    
    abstract public function getRole();
}