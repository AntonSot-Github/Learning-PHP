<?php

//Корзина в магазине, куда добавляются товары

class Cart
{
    //массив выбранных товаров
    public array $data = [];


    //Метод, добавляюший товары в корзину
    //Product в аргументе это экземпляр(объект) класса Product
    //т.е. массив, содержащий свойства Product ($title и $price)
    public function add(Product $product): static
    {
        $this->data[] = $product;
        return $this;
    }

    //Метод для подсчета общей суммы товаров
    public function getTotal(): int|float
    {
        $total = 0;
        //Специальный комментарий (дока), уточняющий какую-лиюо переменную
        /** @var Product $item */
        foreach ($this->data as $item){
            $total += $item->price;
        }
        return $total;
    }
}

//Класс для товара в магазине
class Product 
{
    public string $title = 'Some product';
    public int | float $price;

    //Метод конструктор
    public function __construct(string $title = "Product", int $price = 35)
    {
        //echo "Object has created \n";
        $this->title = $title;
        $this->price = $price;
    }

    //Метод, преобразовующий цену из минимальной единицы валюты(центы, евроценты)
    public function getRealPrice(): int|float 
    {
        return $this->price / 100;
    }

    //Метод для отображения цены с указанием вида валюты
    public function getCurrency($currency = "$"):string
    {
        return $currency . $this->getRealPrice();
    }

}

$product = new Product('Phone', 1000);


$product2 = new Product("book", 21.50);

$cart = new Cart();

echo $cart->add($product)->getTotal() . PHP_EOL;
echo $cart->add($product2)->getTotal()  . PHP_EOL;

var_dump($cart);