<?php
require_once './function_n.php';//Подключаем файл с функцией
//-----String in PHP-----
echo "\n----------String in PHP-----------\n";

$str = "Twin Peaks";

//Перебор строки

$out = '';
for ($i = 0; $i < strlen($str); $i++){
    $out .= $str[$i].'-';
}
echo $out."\n";


//Пример функции substr()
nStr("Пример функции substr()");

$str = "Twin Peaks";
$res = substr($str, 1, 3);
// 2 - индекс символа, откуда начать вывод подстроки
// 3 - количество выводимых символов
echo $res, "\n";//win
