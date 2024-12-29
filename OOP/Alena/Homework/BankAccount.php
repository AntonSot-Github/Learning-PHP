<?php

class BankAccount 
{
    public $owner;
    public $balance;
    public $accountNumber;
    public $currency;

    public function __construct($owner, $accountNumber, $balance = 100, $currency = "USD")
    {
        $this->owner = $owner;
        $this->balance = $balance;
        $this->accountNumber = $accountNumber;
        $this->currency = $currency;
    }

    public function deposit($amount)
    {
        $this->balance += $amount;
    }

    public function withdraw($amount)
    {
        if ($this->balance < $amount){
            echo "Operation is impossible";
        } else {
            $this->balance -= $amount;
            echo "New balance is $this->balance";
        }
    }

    public function getBalance()
    {
        echo $this->balance;
    }

    public function displayAccountInfo()
    {
        echo $this->owner . " " . $this->accountNumber . " " .$this->balance . $this->currency, "\n"; 
    }
}

$alex = new BankAccount("Alexej", 590777, 200);
$dima = new BankAccount("Dmitrij", 448764, 350, "RUB");
$sonia = new BankAccount("Sofia", 375481, currency: "GRN");

$sonia->deposit(300);
print_r($sonia);
//$sonia->withdraw(100);
//$sonia->getBalance();
//$sonia->displayAccountInfo();



