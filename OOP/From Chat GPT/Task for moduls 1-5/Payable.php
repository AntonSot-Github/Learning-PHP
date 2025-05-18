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

class Customer extends User implements Payable
{
    use LoggerTrait;

    public static $customerCount;

    public function __construct($name, $email, $id)
    {
        parent::__construct($name, $email, $id);
        self::$customerCount++;
    }

    public static function getCustomerCount()
    {
        return self::$customerCount . PHP_EOL;
    }

    public function pay():void
    {
        log();
    }

    public function getRole()
    {
        
    }
}

trait LoggerTrait
{
    public function log(string $msg):void
    {
        echo "[LOG]: $msg" . PHP_EOL;
    }
}

class Product 
{
    public const TAX_RATE = 0.25;
    private $name;
    private $price;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        return $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        return $this->price = $price;
    }

    public function getFinalPrice()
    {
        return $this->price * TAX_RATE;
    }
}

class Order
{
    public Customer $customer;
    public array $products = [];

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function addProduct(Product $product):void
    {
        $this->products[] = $product;
    }

    public function getTotal():float
    {
        $total;
        foreach($products as $product){
            $total += $product[price];
        }
        return $total;
    }

    public function checkOut():void
    {

    }
}

$customer1 = new Customer("Petia", "petia@supermail.com", 2);
$customer2 = new Customer("Liosik", "liosik@mail.com", 3);

// echo Customer::$customerCount . PHP_EOL;
// echo Customer::getCustomerCount();

$product1 = new Product("Boots", 40);
$product2 = new Product("BigBurgerForMyTeacher-ChatGPT", 20);

$order1 = new Order($customer1);

$order1->addProduct($product1);
$order1->addProduct($product2);

//print_r ($order1->customer);

$order1->getTotal();


