<?php

require_once './function_n.php';//Подключаем файл с функцией

$arr = [22, 33, 44];

//var_dump($arr);

print_r($arr);
/* (
    [0] => 22
    [1] => 33
    [2] => 44
) */

echo $arr[0], "\n"; //22

//Присвоить другое значение элементу
$arr[1] = 80;
print_r($arr);
/* Array
(
    [0] => 22
    [1] => 80
    [2] => 44
) */

//Добавить эл-т в массив
$arr[3] = 72;
print_r($arr);
/* Array
(
    [0] => 22
    [1] => 80
    [2] => 44
    [3] => 72
) */

$arr[25] = 77;//прописывать новый индекс можно не подряд
print_r($arr);
/* Array
(
    [0] => 22
    [1] => 80
    [2] => 44
    [3] => 72
    [25] => 77
) */

//удаление эл-та
unset($arr[0]);
print_r($arr);
/* Array
(
    [1] => 80
    [2] => 44
    [3] => 72
    [25] => 77
) */

//Длина массива 

count($arr);
echo "length: ", count($arr), "\n"; //length: 4

//Перебор массива
nStr('Перебор массива');

$out = '';
foreach ($arr as $index => $item){
    $out.= "$index - $item \n";
}
echo $out, "\n";

$out1 ='';
foreach ($arr as $item){
    $out1 .= $item." ";
}
echo $out1;//80 44 72 77 

//нахождение суммы эл-тов массива
nStr('Нахождение суммы эл-тов массива');

$arrT = [35, 68, 82, 34];
$s = 0; //переменная для хранения суммы
foreach ($arrT as $item){
    $s += $item;
}
echo $s, "\n";

//нахождение произведения эл-тов массива
nStr('Нахождение произведения эл-тов массива');

$mult = 1;
foreach ($arrT as $item) $mult *= $item;

echo $mult, "\n";


//Поиск минимального и максимального эл-та массива

nStr('Поиск минимального эл-та массива');

$arrT = [35, 68, 82, 34, -5];

$min = $arrT[0];
foreach ($arrT as $item){
    if($item < $min) $min = $item;
}

echo $min, "\n";

$arrT = [35, 68, 82, 34, -5];

nStr('Поиск максимального эл-та массива');

$max = $arrT[0];
foreach ($arrT as $item){
    if($item > $max) $max = $item;
}

echo $max;

//Поиск индекса минимального эл-та массива
nStr('Поиск индекса минимального эл-та массива');

$arrT = [35, 68, 82, 34, -5];

$minIndex = 0;
foreach ($arrT as $index => $item){
    if ($item < $arrT[$minIndex]) {
        $minIndex = $index;
        }

}
echo $minIndex;

//Добавление элемента в конец массива при помощи функции
nStr('Добавление элемента в конец массива при помощи функции');

$arrT = [35, 68, 82, 34, -5];
array_push($arrT, 77);
array_push($arrT, 88);
print_r($arrT);

/* Array
(
    [0] => 35
    [1] => 68
    [2] => 82
    [3] => 34
    [4] => -5
    [5] => 77
    [6] => 88
) */

nStr('Добавление НЕСКОЛЬКИХ элементов в конец массива при помощи функции');
$arrB = [22, 33, 44];
print_r($arrB);
//Было
/* Array
(
    [0] => 22
    [1] => 33
    [2] => 44
)
 */

array_push($arrB, 21, 56, 83);
//Стало
/* Array
(
    [0] => 22
    [1] => 33
    [2] => 44
    [3] => 21
    [4] => 56
    [5] => 83
) 
*/

//Делаем массив из эл-тов другого массива с нечетными элементами 
nStr('Делаем массив из эл-тов другого массива с нечетными элементами');

$arrK = [35, 68, 82, 34, -5, 40, 75, 23];
$temp = [];
foreach ($arrK as $index => $item){
    if ($index % 2 === 0) array_push($temp, $item); 
}
$arrK = $temp;
print_r($arrK);

//Удаление элемента в конце массива
nStr('Удаление элемента в конце массива array_pop');

$arrB = [22, 33, 44];
array_pop($arrB);
/* Array
(
    [0] => 22
    [1] => 33
) */
print_r($arrB);


//Добавление элемента в начало массива при помощи функции
nStr('Добавление элемента или элементов в начало массива при помощи функции');

$arr = [21, 35, 46];
array_unshift($arr, 14, 15, 16);
print_r($arr);
/*Array
(
    [0] => 14
    [1] => 15
    [2] => 16
    [3] => 21
    [4] => 35
    [5] => 46
) */


//Удаление элемента в начале массива
nStr('Удаление элемента в начале массива array_shift');

$arr = [21, 35, 46];
array_shift($arr);
print_r($arr);
/* Array
(
    [0] => 35
    [1] => 46
) */


//Нестрогая проверка на наличие элемента в массиве
nStr('Нестрогая проверка элемента в массива');

$arr = [21, 35, 46];

$check = in_array(22, $arr);
var_dump($check); //false

$check = in_array(21, $arr);
var_dump($check); //true

$check = in_array("21", $arr);
var_dump($check); //true


//Строгая проверка на наличие элемента в массиве
nStr('Строгая проверка элемента в массива');

$arr = [21, 35, 46];

$check = in_array("21", $arr, true);
var_dump($check); //false


//Поиск элемента в массиве с выводом его индекса
nStr('Поиск элемента в массиве с выводом его индекса');

$arr = [21, 35, 46];

$res = array_search(21, $arr);
var_dump($res); //int(0)

$res = array_search(50, $arr);
var_dump($res); //bool(false)


//Формирование массива из уникальных эл-тов другого массива(Удаление повторяющихся)
nStr('Формирование массива из уникальных эл-тов другого массива(Удаление повторяющихся)');

$arr = [21, 35, 46, 43, 17, 35, 23, 46, 60, 21, 21, 35];

$res = array_unique($arr);
print_r($res);

/* Array
(
    [0] => 21
    [1] => 35
    [2] => 46
    [3] => 43
    [4] => 17
    [6] => 23
    [8] => 60
)
 */

