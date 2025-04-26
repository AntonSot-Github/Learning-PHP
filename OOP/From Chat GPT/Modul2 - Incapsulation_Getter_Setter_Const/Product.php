<?php

class Product {
    public $name;
    private $price;
    private $category;
    private $discount;


    public function __construct(string $name, float $price, string $category, int $discount = 0)
    {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->discount = $discount;
    }

    public function getPrice():float
    {
        if ($this->discount > 0){
           return $this->price - ($this->price * ($this->discount / 100)); 
        } else {
            return $this->price;
        }
    }

    public function setDiscount(int $discount)
    {
        if($discount > 0 && $discount < 90){
            $this->discount = $discount;
        } else {
            echo "Discount is not valid \n";
        }
    }

    public function getDiscount():int
    {
        return $this->discount;
    }

    public function setCategory(string $category)
    {
        $categories = ['electronics', 'books', 'clothing', 'other'];
        if(in_array($category, $categories, true)) {
            $this->category = $category;
        } else {
            echo "This category for $this->name is not available". PHP_EOL;
        }
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function showInfo()
    {
        echo "Name: {$this->name}, Price with discount: {$this->getPrice()} (Discount: {$this->getDiscount()}%), Category: {$this->getCategory()}" . PHP_EOL; 
    }

    public function isExpensive():bool
    {
        return $this->price > 1000;
    }

}

$product1 = new Product("TV", 1200, "electronics");
$product1->setDiscount(20);
$product1->showInfo();

$product2 = new Product("PC", 4500, "electronics");

$product3 = new Product("Bycicle", 3000, "electronics");
$product3->setCategory("other");
$product3->showInfo();

$product4 = new Product("Car", 20000, "other");

$product5 = new Product("Shirt", 150, "clothing");

$product6 = new Product("Pants", 120, "clothing");

$products = [$product1, $product2, $product3, $product4, $product5, $product6];

// print_r($products);

// echo $products[0]->name;

foreach ($products as $product){
    echo $product->showInfo() . PHP_EOL;
}

echo "-------------------------------------\n" . PHP_EOL;

usort($products, function($a, $b) {
    return $a->getPrice() <=> $b->getPrice();
});

foreach ($products as $product){
    echo $product->showInfo() . PHP_EOL;
}



