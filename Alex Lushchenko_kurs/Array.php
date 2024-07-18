<?php

require_once './function_n.php';

nStr("Многомерный массив");
//Многомерный массив
$transport = [
    "Boat",
    'Cars' => ['Lada', 'Jeep', 'Volvo'],
    'Airplans' => ['Boeing', 'Airbus', 'Cessna'],
    'Ships' => ['Austal', 'Damen', 'Imabari'],
    'Bikes' => [
        'Pinarello' => ['Dogma', 'Bolide'],
        'Marin' => ['Bobcat', 'Eldrige'],
        'Giant' => [' Trance X', 'Anytour', 'Revolt']
    ]
];
print_r($transport);
echo $transport['Cars'][0], "\n";
echo $transport['Bikes']['Marin'][1], "\n";

//Использование элементов вложенного массива при выводе текста
echo "My transport for today is {$transport['Cars'][2]}", "\n";//Volvo
echo "My transport for today is {$transport['Bikes']['Marin'][1]}", "\n";//Eldrige

//Использование элемента массива при выводе текста (без вложенностей)
echo "My transport for today is $transport[0]", "\n";

$arr = [4, 6, "solution"];
echo "My $arr[2] is to study", "\n";

$db = array (
    "1b7b" => array ("name" => 'Mary', "age" => 24),
    "412a" => array ("name" => 'Wade', "age" => 21),
    "dc77" => array ("name" => 'Dave', "age" => 25),
    "516b" => array ("name" => 'Riley', "age" => 22),
    "sdsde" => array ("fda" => "sdeerf")
);


function getValue($arr, $field) {
    $newArr = [];
    foreach ($arr as $item){
        if (isset($item[$field])) array_push($newArr, $item[$field]);
        else continue;
    }
    return $newArr;
}

$result = getValue($db, 'name'); 
print_r($result);



$db = array (
    "1b7b" => array ("name" => 'Mary', "age" => 24),
    "412a" => array ("name" => 'Wade', "age" => 21),
    "dc77" => array ("name" => 'Dave', "age" => 25),
    "516b" => array ("name" => 'Riley', "age" => 22),
);

function getColumn($arr, $field) {
    $result = [];
    foreach ($arr as $index => $item) {
        $result[$index] = $item[$field];
    }
    return $result;
}


$result = getColumn($db, 'name');
print_r($result);

$result = getColumn($db, 'age');
print_r($result);

//Напишем функцию arrayEveryString которая получает аргумент и имя функции для проверки. Проверяет, что каждая строка в массиве длиной 4 символа. Возвращает true / false. Проверка длины строки выполняется в callback6.


$db = ['dddd', 'cscs', 'prsr', 'cant'];

function arrayEveryString($arr, $call) {
    foreach ($arr as $item){
        if ($call($item) === false) return false;
    }
   return true; 
}

function callback6($item) {
    return strlen($item) == 4;
}

$result = arrayEveryString($db, 'callback6'); 
var_dump($result);

//Напишем функцию, array_prepare которая принимает массив строк 
//и возвращает новый массив где все строки очищены от пробелов 
//по краям строки, приведены к нижнему регистру, если в исходном массиве присутствуют 
//пустые строки - то они не входят в результирующий массив. 

$db = ['Hello' , 't aSk', '  go ', 'yiI2   ', '', '', '2   ', 'teSt ' ];


function array_prepare($arr) {
   $arrOfCleanedStr = [];
   foreach($arr as $item){
    if($item !== ''){
        array_push($arrOfCleanedStr, trim(strtolower($item)));
    }
   }
   return $arrOfCleanedStr;
}

$result = array_prepare($db);
print_r($result);

//Еще один вариант решния (от GPT)

$db = ['Hello' , 't aSk', '  go ', 'yiI2   ', '', '', '2   ', 'teSt ' ];
function array_prepare1($arr) {
    // Преобразуем каждый элемент массива: убираем пробелы по краям и приводим к нижнему регистру
    $arr = array_map(function($item) {
        return trim(strtolower($item));
    }, $arr);
    
    // Исключаем пустые строки из массива
    $arr = array_filter($arr, function($item) {
        return $item !== '';
    });
    
    return array_values($arr);// Переиндексируем массив, чтобы ключи были последовательными числами

}
$result = array_prepare1($db);
print_r($result);

//Функция array_fill() для создания массива с одинаковыми значениями
//заданного количества элементов
$arr2 = array_fill(0, 5, "Some");
print_r($arr2);

//Функция объединения нескольких массивов в один новый массив
$arr1 = array("a" => 10, "b" => 15);
$arr2 = array("b" => 20, "c" => 50);
$arr3 = array_merge($arr1, $arr2);
print_r($arr3);
$arr4 = array_merge($arr2, $arr1);
print_r($arr4);

$arr5 = $arr1 + $arr2;//можно объединять с помощью оператора "+"
print_r($arr5);

//Функция list()
$arr = [1,2,3];
list($one, , $t) = $arr;
echo $one, "\n", $t, "\n";

nStr("Проверка существования элементов массива");
//Проверка существования элементов массива
$arr = [3 => 1, 2, 3];
for ($i = 0; $i < count($arr) + 5; $i++){
    if(isset($arr[$i])) echo "Element with index $i is exist \n";
    else echo "Element with index $i is not exist \n";
}


nStr("Выводим случайный элемент массива с помощью функции rand()");
//Выводим случайный элемент массива с помощью функции rand()

$arrForRand = ["Milk", "Meat", "Solt", "Potatoes"];
echo ($arrForRand[rand(0, count($arrForRand) - 1)]);

//Создаем массив случайной длины со случайными элементами, сортируем значения от наименьшего к большему
nStr("Создаем массив случайной длины со случайными элементами, сортируем значения от наименьшего к большему");

function randArr(){
    $length = rand(1, 10);
    $arr = [];
    for ($i = 0; $i < $length; $i++){
        $arr[$i] = rand(0, 100);
    }
    sort($arr);//сортируем значения от наименьшего к большему
    return $arr;
}
$newArr = randArr();
print_r($newArr);

//Создаем массив из строк текстового файла
nStr("Создаем массив из строк текстового файла");
$arrFile = file('../Months.txt');
print_r($arrFile);

$db = array (
    "1b7b" => array ("name" => 'Mary', "age" => 24),
    "412a" => array ("name" => 'Wade', "age" => 21),
    "dc77" => array ("name" => 'Dave', "age" => 25),
    "516b" => array ("name" => 'Riley', "age" => 22),
);

sort($db);
print_r($db);