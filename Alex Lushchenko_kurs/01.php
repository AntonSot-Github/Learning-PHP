<?php
$foo = 55;
$bar = 77;

echo ($foo + $bar);
echo "\n";
echo 4;
echo "\n";
var_dump($foo);

$t = 7.45;
var_dump($t);

echo "\n\n";
//Цикл for

for($i = "A"; $i != "AA"; $i++){
    echo $i." ";
}

echo "\n\n";

for($i = 20; $i >= 0; $i = $i -1){
    echo $i." ";
}
echo "\n\n";
//Прерывание цикла, команда break

for($i = 0; $i <=100; $i = $i + 10){
    echo $i." ";
    if ($i === 80){
        break; //Остановка работы цикла при строгом равенстве $i = 80
    }
}
echo "\n\n";

//Пропуск итерации цикла, команда continue
for ($i = 0; $i <= 10; $i++){
    if ($i === 5){
        continue;
    }
    echo $i.",";
}

echo "\n\n";

//Цикл while
$i = 0;
while ($i <= 10){
    $i++;
    echo $i." ";    
}

echo "\n\n";

//Цикл while с шагом на уменьшение
$i = 1000;
while($i >0){
    $i = $i - 100;
    echo $i." ";
}

echo "\n\n";

//Цикл while с прерыванием break
$i = 1000;
while($i >0){    
    $i = $i - 100;
    if ($i === 500) break;
    echo $i." ";
}

echo "\n\n";

//Цикл while с пропуском итерации continue
$i = 1000;
while($i >0){    
    $i = $i - 100;
    if ($i === 500 or $i === 400) continue;
    echo $i." ";
}

echo "\n\n";

//Цикл while с нахождением суммы чисел
$i = 0; //счетчик
$sum = 0; //Перменная для накопления
while ($i <= 5){
    $sum = $sum + $i; //$sum += $i; -сокращённая форма записи
    $i++;   
}
echo $sum;

echo "\n\n";

//Цикл while - задача
//Нужно вывести, на каком шаге итерации накопленная сумма составит 1000
$i = 0;
$sum = 0;
while ($sum <= 1000){
    $sum = $sum + $i;
    $i++;
}
echo $sum, "\n";
echo $i, "\n";

//Цикл do while
//Отличие в том, что хотя бы 1 раз цикл выполнится в независимости от значения счетчика
$i = 0;
do{
    $i++;
    echo $i." ";
} while($i < 10); //1 2 3 4 5 6 7 8 9 10 

echo "\n\n";


//Ветвление if else
$a = 150;
if ($a > 100){
    echo '$a more than 100'; 
} 
else {
    echo '$a less than 100';
}

echo "\n";
//сокращенная форма написания на проверку условия без ветвления
if ($a % 2 === 0) echo "variable a is even number", "\n";//проверка на четность

//Пример использования If на практическом примере
$password = "adsdererf";
$email = "fauna@gmail.com";
if (strlen($password) > 8)
{
    echo "password is ok", "\n";
}
else {
    echo "password is not ok","\n";
}
if (strripos($email, "@") !== false) 
{echo "email is ok", "\n";
}
else {
    echo "email is not ok", "\n";
}

//Комбинация условий
$t = 47;
if ($t >= 40 && $t <= 65) echo "hot water", "\n";
if ($t <= -1 OR $t >= 101) echo "signal error", "\n";

//Если вариантов несколько
$s = 70;
if ($s < 45) echo "bronze", "\n";
elseif ($s < 75) echo "silver", "\n";
elseif ($s < 125) echo "gold", "\n";
else echo "VIP", "\n";

//Операторы SWITCH/CASE для сравнения переменной с чем либо 

$role = "user";

switch ($role){
    case "admin":
        echo "full control", "\n";
        break;
    case "moderator":
        echo "manage articles and comments", "\n";
        break;
    case "user":
        echo "write comments to articles", "\n";
        break;
    default:
        echo "role is underfined", "\n";
}

//тернарный оператор

$resault = 6; 
$res;

$res = ($resault === 5) ? $res = 10 : $res = 15;
echo $res, "\n";

//Рисуем прямоугольник в терминале
echo "\n -----Рисуем прямоугольник в терминале------ \n";
for($k = 0; $k < 5; $k++){
    for($i = 0; $i < 20; $i++){
        echo "*";
    }
    echo "\n";
}

//Рисуем треугольник в терминале
echo "\n -----Рисуем треугольник в терминале------ \n";
for ($k = 0; $k < 5; $k++){
    for($i = 0; $i <= $k; $i++){
        echo "*";
    }
    echo "\n";
}

echo "\n ----------- \n";

$out = '';
for ($k = 0; $k < 5; $k++){
    for($i = 0; $i <= $k; $i++){
        $out .= "*";
    }
    $out .= "\n";
}
echo $out;

echo "\n ------Таблица умножения на 7----- \n";

for($i = 0; $i <= 10; $i++){
    echo "7 * $i = ".($i * 7)."\n";
}

echo "\n ------Таблица умножения на 8----- \n";
for($i = 0; $i <= 10; $i++){
    $t = $i * 8; //вводим промежуточную переменную для упрощения записи вывода
    echo "8 * $i = $t", "\n";
}

echo "\n ------Вывод массива чисел----- \n";
for ($i = 0; $i < 5; $i++){
    for ($k = 1; $k <= 10; $k++){
        if ($i == 0 AND $k < 10) echo '0';
        echo 10 * $i + $k, " ";
    }
    echo "\n";
}
echo "\n ------Вывод того же массива чисел в обратном порядке----- \n";
for ($i = 5; $i > 0; $i--){
    for ($k = 0; $k < 10; $k++){        
        echo (10 * $i - $k), " ";
    }
    echo "\n";
}


print_r ($argv);
