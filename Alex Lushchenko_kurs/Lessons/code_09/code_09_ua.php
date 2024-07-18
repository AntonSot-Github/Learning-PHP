<?php

$s = "Twin Peaks";

echo "\n\n ===  Довжина рядка === \n";

echo strlen($s), "\n";

echo "\n\n ===  Перебирати рядки === \n";

$out = '';
for ($i = 0; $i < strlen($s); $i = $i + 1) {
    $out .= $s[$i].'=';
}
echo $out, "\n";
echo $s[6],"\n";

echo "\n\n ===  Реверс === \n";

$s2 = strrev($s);
echo $s2, "\n";
$s2 = strrev($s2);
echo $s2, "\n";

echo "\n\n ===  Пошук підрядка === \n";
$s = "Twins Peaks";

// залежить від регістра!!!!!
$res = str_contains($s, 'P'); // true, false
var_dump($res);

// шукаємо по індексу
// залежить від регістра
$res = strpos($s, "p"); // індекс чи false
var_dump($res);

// шукаємо по індексу
// не залежить від регістра
$res = stripos($s, "p"); // індекс чи false
var_dump($res);


// шукаємо по індексу з кінця
// не залежить від регістра
$res = strripos($s, "s"); // індекс чи false
var_dump($res);

echo "\n\n === Заміна символа === \n";

$s = "Twin Peaks";
$s[4] = "|";
echo $s, "\n"; 

echo "\n\n === Регістри === \n";

$s = "twin Peaks";
$s3 = ucfirst($s);
echo $s3, "\n";

$s3 = strtoupper($s);
echo $s3, "\n";

$s3 = strtolower($s);
echo $s3, "\n";

echo "\n\n === Пробіли === \n";

$s4 = '  Trait  ';
var_dump($s4);
$s5 = trim($s4);
var_dump($s5);

echo "\n\n === Комментування тексту === \n";

$s4 = "it's correctl/y \ user used to try to";
var_dump($s4);
$s5 = addslashes($s4);
var_dump($s5);
$s6 = stripcslashes($s5);
var_dump($s6);

echo "\n\n === Теги HTML === \n";
$s4 = '<span><b>go</b></span>';
$s5 = htmlspecialchars($s4);
var_dump($s5);

echo "\n\n === Форматування чисел === \n";
$price = 12234.4555;
echo number_format($price, 2, '.',  ' ');


echo "\n\n === заміна рядка на рядок === \n";

echo str_replace('bb', 'c', 'aaaaabbbbaaabbaaadddb'), "\n";

echo "\n\n === видаляти теги === \n";
$s4 = '<span>go went 555</span>';
echo strip_tags($s4);
