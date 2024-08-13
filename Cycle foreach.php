<?php


for($i = 0; $i < 10; $i++){
    $arr[$i] = $i + 1;
}
print_r($arr);

echo "----------------------------------------------------- \n";

for ($i = 0; $i < count($arr); $i++){
    echo $arr[$i], "\n";
}

echo "----------------------------------------------------- \n";

foreach($arr as $item){
    echo $item, "\n";
}

echo "----------------------------------------------------- \n";

foreach($arr as $key => $item){
    echo "{$key} => {$item} \n";
}
/* 
0 => 1 
1 => 2 
2 => 3 
3 => 4 
4 => 5 
5 => 6 
6 => 7 
7 => 8 
8 => 9 
9 => 10 
 */

echo "----------------------------------------------------- \n";

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

echo "----------------------------------------------------- \n";

foreach($products as $key => $product){
    echo "Good №". $key + 1, "\n\n";
    echo "Name: ". $product['title'], "\n";
    echo "Price: ". $product['price']."$", "\n\n";
}
echo "----------------------------------------------------- \n";

//Увеличить цену в 2 раза
foreach($products as &$item){ // Передаем элемент по ссылке
    $item['price'] = $item['price'] * 2;
    echo $item['price'], "\n";
}
unset($item); // Разорвать ссылку на последний элемент
print_r($products);

echo "----------------------------------------------------- \n";
/*
Дан массив:
$nums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10,];
1. Посчитайте среднее значение элементов массива => 5.5
2. Посчитайте сумму элементов массива => 55
*/
$nums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10,];

$sum = 0;
foreach($nums as $item){
    $sum += $item;
}
$avVal = $sum / count($nums);
echo $avVal, "\n";
echo $sum, "\n";

echo "----------------------------------------------------- \n";
/* 
Дан массив:
$arr = ["hello", "world"];
Составьте из него строку с разделителем пробел => hello world
Обратите внимание, после последнего слова пробела быть не должно. 
*/
$arr = ["hello", "crazy" ,"world"];
$str = '';
foreach($arr as $index => $item){
    if($index != count($arr) - 1){
        $str .= $item." ";
    }else {
        $str .= $item;
    }
}
var_dump($str);
//Решение от преподавателя
$str = '';
$i = 1;
foreach ($arr as $word) {
    if ($i > 1) {
        $str .= " {$word}";
    } else {
        $str .= $word;
    }
    $i++;
}
var_dump($str);
?>