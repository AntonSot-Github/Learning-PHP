<?php
//Цикл while
echo '<hr>';
$i = 0;
while ($i <= 10){
    $i++;
    echo $i." ";    
}

echo "\n\n";

//Цикл while с шагом на уменьшение
echo '<hr>';
$i = 1000;
while($i >0){
    $i = $i - 100;
    echo $i." ";
}

echo "\n\n";

//Цикл while с прерыванием break
echo '<hr>';
$i = 1000;
while($i >0){    
    $i = $i - 100;
    if ($i === 500) break;
    echo $i." ";
}

echo "\n\n";

//Цикл while с пропуском итерации continue
echo '<hr>';
$i = 1000;
while($i >0){    
    $i = $i - 100;
    if ($i === 500 or $i === 400) continue;
    echo $i." ";
}

echo "\n\n";

//Цикл while с нахождением суммы чисел
echo '<hr>';
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
echo '<hr>';
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
echo '<hr>';
$i = 0;
do{
    $i++;
    echo $i." ";
} while($i < 10); //1 2 3 4 5 6 7 8 9 10 

// Task 07
// Дана переменная $year1 и $year2. Сформируйте строку $out в которой будут четные года от $year1 (включительно) до $year2(включительно). Разделитель - пробел. Вывести результат. 
// Например, если $year1 равен 1900 а $year2 равен 1906 то в $out должна быть строка '1900 1902 1904 1906 ' . Решите с while.

$year1= 2000;
$year2 = 2022;

# write your code under this line
echo '<hr>';
$out = '';
while ($year1 <= $year2) {
    if ($year1 % 2 == 0) $out .= $year1.' ';
    $year1++;
}
echo $out; //2000 2002 2004 2006 2008 2010 2012 2014 2016 2018 2020 2022 

$out1 = '';
while ($year1 <= $year2) {
    $out1 .= $year1.' ';
    $year1 += 2;
}
echo $out1; //2000 2002 2004 2006 2008 2010 2012 2014 2016 2018 2020 2022 



// Дана переменная $n. Сформируйте строку $out on $n (включительно) до 1 (включительно), причем в out должны быть только нечетные числа. Реализуйте с помощью while, continue.
// Например, если $n равен 5 ,  то в $out должна быть строка '5_3_1_' 

$n = 7;
$out = '';

# write your code under this line
echo '<hr>';
while ($n >= 1) {
    //если n нечетная, то условие в if не выполняется, поэтому блок if пропускается и работает декримент
    //вне блока if
    //если n - четное, то срабатывает if, в нем декримент, итерация в while пропускается
    if ($n % 2 == 0){
        $n--;
        continue;
    }
    $out .= $n.'_';
    $n--;
}
echo $out; //7_5_3_1_


// Дана переменная $n. С помощью цикла найдите произведение чисел от 1 (включительно) до $n (включительно) чисел. Произведение должно быть в переменной $p. Если $p становится больше 2000 прервать цикл. Выведите $p. Задачу решите с помощью while.
// Например $n = 6. Нужно найти произведение 1*2*3*4*5*6
$n = 17;
$p = 1;
# write your code under this line
echo '<hr>';
$i = 0;
while ($i <= 17) {
    $i++;
    if ($p > 2000) break;
    $p *= $i;
}
echo $p; //5040


// Дана переменная $n. Сформируйте строку $out в которой будут числа от единицы (включительно) до $n (включительно). Причем числа 4, 7, 9 пропущены. Решите с while и continue.
// Например, если $n равен 10 то в $out должна быть строка '1_2_3_5_6_8_10_' 
// Если $n равен 13 то в $out должна быть строка '1_2_3_5_6_8_10_11_12_13_'
$n = 13;
$out = '';
# write your code under this line

echo '<hr>';
$i = 0;
while ($i < $n) {
    $i++;
    if($i == 4 || $i == 7 || $i == 9) continue;
    else $out .= $i.'_';
}
echo $out, "\n"; //1_2_3_5_6_8_10_11_12_13_
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cykles while-do-while</title>
</head>
<body>
    <?php
    echo '<hr>';
    echo '--- Example of using cycle while in real code ---', '<br>', '<br>';
    echo '<select style = "margin-left: 7%;">';
        $year = 1900;
        while ($year <= 2024){
            echo "<option>{$year}</option><br>";
            $year++;
        }
    echo '</select>', '<br>', '<br>';
    echo '<hr>';
    ?>
</body>
</html>