<?php

/* 
Финальное задание по модулям 1–5
🧠 Суть задания:
Ты реализуешь систему управления заказами в магазине, в которой есть пользователи, товары и заказы. Код должен использовать все ключевые темы из модулей.

📦 Что тебе нужно реализовать:
1️⃣ Интерфейс Payable
php
Копировать
Редактировать
interface Payable {
    public function pay(): void;
}
2️⃣ Абстрактный класс User
Свойства: $name (string), $email (string), $id (int)

Конструктор и деструктор

Геттеры/сеттеры

Абстрактный метод getRole()

3️⃣ Класс Customer, который наследуется от User и реализует интерфейс Payable
Статическое свойство $customerCount

Статический метод getCustomerCount()

Метод pay(), в котором используется трейтовый лог

4️⃣ Трейт LoggerTrait
php
Копировать
Редактировать
trait LoggerTrait {
    public function log(string $msg): void {
        echo "[LOG]: $msg" . PHP_EOL;
    }
}
5️⃣ Класс Product
Константа TAX_RATE

Приватные свойства: $name, $price

Геттеры/сеттеры

Метод getFinalPrice() (возвращает цену с налогом)

6️⃣ Класс Order
Свойства: $customer (тип Customer), $products (массив Product)

Метод addProduct(Product $product): void

Метод getTotal(): float

Метод checkout(): void
→ должен вызывать $customer->pay()
→ логировать действие
→ вывести сумму заказа

📜 Пример использования:
php
Копировать
Редактировать
$customer = new Customer("Alice", "alice@example.com", 1);
$product1 = new Product("Book", 500);
$product2 = new Product("Pen", 50);

$order = new Order($customer);
$order->addProduct($product1);
$order->addProduct($product2);
$order->checkout();

echo "Total customers: " . Customer::getCustomerCount();
*/

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

    public function __destruct()
    {
        echo "{$this->name} ({$this->id}) is deleted from DB" . PHP_EOL;
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
        $this->log();
    }

    public function getRole()
    {
        
    }
}

trait LoggerTrait
{
    public function pay(): void
    {
        $this->log("Payment has been completed for {$this->getName()}");
    }
}

class Product 
{
    public const TAX_RATE = 0.25;
    private $name;
    private $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

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
        return $this->price * (1 + self::TAX_RATE);
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

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getFinalPrice();
        }
        return $total;
    }

    public function checkout(): void
    {
        $this->customer->pay();
        $this->customer->log("Order has been placed.");
        echo "Total amount: {$this->getTotal()}" . PHP_EOL;
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

/* 
Пример использования:
$customer = new Customer("Alice", "alice@example.com", 1);
$product1 = new Product("Book", 500);
$product2 = new Product("Pen", 50);

$order = new Order($customer);
$order->addProduct($product1);
$order->addProduct($product2);
$order->checkout();

echo "Total customers: " . Customer::getCustomerCount();
*/
