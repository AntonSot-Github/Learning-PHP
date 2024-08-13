<?php

//Task: show all goods from $products which have price less 200. Use cykles while and for

$products = [
    [
        'title' => 'Nokia',
        'price' => 100,
        'qty' => 123,
    ],
    [
        'title' => 'Sony',
        'price' => 200,
        'qty' => 12,
    ],
    [
        'title' => 'LG',
        'price' => 150,
        'qty' => 130,
    ],
];

$i = 0;
while ($i <= 2){
    if ($products[$i]['price'] < 200){
        echo $products[$i]['title']. ' - ' . $products[$i]['price'].'$',"\n";
    }
    $i++;
}

for($i = 0; $i <= 2; $i++){
    if ($products[$i]['price'] < 200){
        echo $products[$i]['title']. ' - ' . $products[$i]['price'].'$',"\n";
    }
}