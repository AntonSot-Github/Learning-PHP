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

$a = 14;
var_dump($a);
function sum(&$a){
    $a = $a + 10;
    return $a;
}
echo sum($a), "\n";
echo $a;//Первоначальное значение изменяется при запуске функции


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
echo $bytes, " ", $kBytes, " ", $MBytes, " ", $GBytes, "\n";

//Рекурсивные функции
nStr("Рекурсивные функции");
function rekursia($counter){
    if($counter > 0){
        echo ($counter--), "\n";
        rekursia($counter);//функция вызывает сама себя, пока $counter > 0 
    } else return;
}
rekursia(8);

//Пример вызова функции через переменную
nStr("Пример вызова функции через переменную");
function first(){
    return "1";
}
function second(){
    return "2";
}

$newFunction = rand(0, 1) ? "first" : "second";//В условии генерируется либо 1(истина), либо ноль(ложь)
echo $newFunction, "\n";

$str = "dfgherty";
$s = str_contains($str, "gho");
echo $s;


//Функция, принимающая любое количество аргументов
nStr("Функция, принимающая любое количество аргументов");
function sum2($f, $g, ...$nums)
{
    $res = $f + $g;
    foreach($nums as $num){
        $res += $num;
    }
    echo $res, "\n";
}
sum2(4, 9);//Можно передать только 2 аргумента
sum2(3, 5, 8, 2, 4, 7);///Если передать больше аргументов, то они войдут в массив $nums


//Передача именованных аргументов в параметры функции
nStr("Передача именованных аргументов в параметры функции");
function sum3($a, $b, $c)
{
    echo ($a + $b) * $c;//21
}
sum3(c: 3, b: 5, a: 2);

//Типы переменных в параметрах функции 
nStr("Типы переменных в параметрах функции");
function sum4(int $a, float $b, int $c)
{
    var_dump($a, $b, $c);
    return $a + $b + $c;
}
//Вернет результат float, потому что одна из переменных в параметрах указана как float
var_dump(sum4(true, 5, 7.18));//float(13)

//Чтобы получить нужный тип данных результата функции, следует его указать:
function sum5(int $a, float $b, int $c):int 
{
    return $a + $b + $c;
}
var_dump(sum5(true, 5, 7.18));//int(13)