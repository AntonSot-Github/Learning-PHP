<?php
require_once './function_n.php';//Подключаем файл с функцией

//Примеры функций и глобальных переменных
nStr("Примеры функций и глобальных переменных");
$d = 70;
function t3(){
    global $d;
    echo $d, "\n";
    $d = $d + 5;
}
t3();
echo $d, "\n";


$n1 = 5;
$n2 = 4;
function increase(){
    global $n1, $n2;
    if ($n1 > $n2){
        $t = $n1;
        $n1 = $n2;
        $n2 = $t;
    }
    echo '$n1 = '.$n1, "\n";
    echo '$n2 = '.$n2, "\n";
}
increase();

//Передача аргументов по ссылке
nStr("Передача аргументов по ссылке");
function sum(&$a){
    $a = $a + 10;
    return $a;
}

$b = 10;//Первоначальное значение изменяется при запуске функции
echo sum($b), "\n";

echo $b;

//Пример статической переменной
nStr("Пример статической переменной");

function sum1(){
    static $count = 0;
    return ++$count;
}
//Переменная $count изменяется при каждом вызове функции
echo sum1(), "\n";
echo sum1(), "\n";
echo sum1(), "\n";

//Пример функции, рассчитывающей объем данных
nStr("Пример функции, рассчитывающей объем данных");

function formatSize($bytes){
    $kBytes = $bytes / 1024;
    $MBytes = $kBytes / 1024;
    $GBytes = $MBytes / 1024;
    return [$bytes, $kBytes, $MBytes, $GBytes];
}
print_r (formatSize(456286732));

//используем list в примере
list($bytes, $kBytes, $MBytes, $GBytes) = (formatSize(356274795)); 
echo $bytes, " ", $kBytes, " ", $MBytes, " ", $GBytes;

