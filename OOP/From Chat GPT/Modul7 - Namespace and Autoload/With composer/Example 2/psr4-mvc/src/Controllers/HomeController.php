<?php

namespace App\Controllers;

use App\Models\Product;

class HomeController
{
    public function index(): void
    {
        $product = new Product();
        echo "Товар на главной: " . $product->getName();
    }
}
