<?php

$s = "Twin Peaks";

echo "\n\n ===  Длина строки === \n";

echo strlen($s), "\n";

echo "\n\n ===  Перебор строки === \n";

$out = '';
for ($i = 0; $i < strlen($s); $i = $i + 1 ) {
    $out .= $s[$i].'-';
}

echo $out, "\n";
echo $s[1], "\n";

echo "\n\n ===  Реверс строки === \n";

$s2 = strrev($s);
echo $s2, "\n";

$s2 = strrev($s2);
echo $s2, "\n";

echo "\n\n ============ Поиск подстроки === \n";

$s = "Twin Peaks";
// str_contains - зависит от регистра !!!
$res = str_contains($s, 'T'); // true, false
var_dump($res);
// неприятная особенность
$res = str_contains($s, ''); // true
var_dump($res);

echo "\n\n ============ Поиск подстроки - индекс === \n";

$s = "Twin Peaks";
// если не найдено false
// зависит от регистра
$res = strpos($s, 'P'); // первый индекс начала подстроки в строке
var_dump($res);

// stripos - i от регистра
$res = stripos($s, 'p');  // i - не зависит от регистра !!!!
var_dump($res);

// поиск с конца строки
$s = "Tswin Peaks";

$res = strripos($s, 's'); // не зависит от регистра i , r - поиск с конца строки
var_dump($res);

$res = strrpos($s, 's');
var_dump($res);

echo "\n\n === Изменение символа === \n";

$s = "Twin Peaks";
$s[4] = "|";
echo $s, "\n";

echo "\n\n === Преобразование регистров === \n";

$s = 'twin Peaks';
echo ucfirst($s), "\n"; // первый символ - uppercase

echo strtoupper($s), "\n";
echo strtolower($s), "\n";

echo "\n\n === Удаление === \n";

$s4 = '  Trait  ';
var_dump($s4);
$s5 = trim($s4);
var_dump($s5);

echo "\n\n === Комментирование слешами === \n";

$s4 = "in'correctl/y \ used to try to";
var_dump($s4);
$s5 = addslashes($s4);
var_dump($s5);
$s6 = stripcslashes($s5);
var_dump($s6);

echo "\n\n === Комментирование спецсимволами === \n";
$s4 = '<span><b>go</b></span>';
$s5 = htmlspecialchars($s4);
var_dump($s5);

echo "\n\n ============ Удаляем теги === \n";
$s4 = '<span>go went 444</span>';
echo strip_tags($s4);

echo "\n\n ============ Форматирование вывода  === \n";
$price = 12234.4555;
echo number_format($price, 2, '.',  ' ');

echo "\n\n ============ Замена === \n";

echo str_replace('bb', 'c', 'aaaaabbbbaaabbaaadddbbb'), "\n";

