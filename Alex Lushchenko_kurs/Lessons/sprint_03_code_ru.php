<?php

// ====== Типы данных ===========
// целое число (int - integer)
$a = 5; 
var_dump($a);
$a = -5;
var_dump($a);

// дроби (float)
$a = 7.40; 
var_dump($a);

$a = .4;
var_dump($a);

$a = -0.00002;
var_dump($a);

/** бек ту JS
* const num = 0.2 + 0.4; // 0.6000000000000001
* console.log(num === 0.6); // false
*/

$a = 0.2 + 0.4;
var_dump($a);
var_dump($a === 0.6);

// Математические функции BCMath произвольной точности

// Булевы значения true, false (bool)
echo ("\n\n\n");
$a = true;
var_dump($a);
echo "\n";
echo $a;

$a = false;
var_dump($a);
echo "\n";
echo $a;
echo "\n";

// Строки
$b = 'hello';
var_dump($b);
// длину строки
$l = strlen($b);
echo "\n $l \n";

echo "Bazuem ".$b; // несколько конкатенаций

// ==================== Проверить тип данных =============== 
echo "\n\n\n ======== Проверяем тип данных ============= \n\n\n";

$a = 5;
echo gettype($a); // integer
echo "\n";

$a = 5.5;
echo gettype($a); // double
echo "\n";

$a = true;
echo gettype($a); // boolean
echo "\n";

$a = 'choose your power';
echo gettype($a); // string
echo "\n";

var_dump(gettype(5.5) === 'integer');

// ==================== Преобразование типов =============== 
echo "\n\n\n ======== Преобразование типов ============= \n\n\n";

$a = 5.0;
echo gettype($a);
echo "\n";
$b = $a * $a;
echo $b;
echo "\n";
echo gettype($b);

// ==================== Округление =============== 
echo "\n\n\n ======== Округление ============= \n\n\n";

$a = 5.55;
echo gettype($a);
echo "\n";
$b = round($a);
echo $b;
echo "\n";
echo gettype($b);

// ==================== Проверка на тип =============== 
echo "\n\n\n ======== Проверка на тип ============= \n\n\n";

$a = '11';
var_dump(is_int($a));
var_dump(is_bool($a));
var_dump(is_float($a));
var_dump(is_string($a));