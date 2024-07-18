<?php
$s = "Twin Peaks";
$s1 = "Огонь";

echo "\n\n ===  Длина строки === \n";

echo strlen($s), "\n";
echo strlen($s1), "\n";

echo "\n\n === Перебор строки === \n";

$out = '';
for ($i = 0; $i < strlen($s); $i++) $out .= $s[$i]."-";
echo $out;

echo "\n\n ===  Реверс === \n";

$s2 = strrev($s);
echo $s2, "\n";

$s2 = strrev($s1);
echo $s2, "\n";


echo "\n\n ============ Поиск подстроки === \n";

$result = str_contains('A baba Galamaga', '');
var_dump($result);

echo "\n\n === Поиск подстроки в строке === \n";
$s = "Twin Peaks";

$res = stripos($s, 'j'); // не зависит от регистра
echo $res, "\n";

$res = strpos($s, 'p'); // зависит от регистра
echo $res, "\n";

echo "\n\n === Изменение символа === \n";
$s[4] = "|";
echo $s, "\n"; // Twin|Peaks


echo "\n\n === Преобразование регистров === \n";

$s3 = ucfirst('twin'); // первая буква
echo $s3, "\n";

$s3 = strtoupper('twin'); // все слово
echo $s3, "\n";

$s3 = strtolower('tWIn'); // все слово
echo $s3, "\n";

echo "\n\n === Удаление пробелов === \n";

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

$s4 = '<span>go</span>';
$s5 = htmlspecialchars($s4);
var_dump($s5);



echo "\n\n ============ Форматирование вывода  === \n";

$price = 12234.4555;
echo number_format($price, 2, '.',  '_');

echo "\n\n ============ Замена === \n";

echo str_replace('bb', 'c', 'aaaaabbbbaaabbaaaddd'), "\n";

echo "\n\n ============ Удаляем теги === \n";
$s4 = '<span>go went</span>';
echo strip_tags($s4);

