<?php
//Ветвление if else
$a = 150;
if ($a > 100){
    echo '$a more than 100'; 
} 
else {
    echo '$a less than 100';
}

echo "\n";
//сокращенная форма написания на проверку условия без ветвления
if ($a % 2 === 0) echo "variable a is even number", "\n";//проверка на четность

//Пример использования If на практическом примере
$password = "adsdererf";
$email = "fauna@gmail.com";
if (strlen($password) > 8)
{
    echo "password is ok", "\n";
}
else {
    echo "password is not ok","\n";
}
if (strripos($email, "@") !== false) 
{echo "email is ok", "\n";
}
else {
    echo "email is not ok", "\n";
}

//Комбинация условий
$t = 47;
if ($t >= 40 && $t <= 65) echo "hot water", "\n";
if ($t <= -1 OR $t >= 101) echo "signal error", "\n";

//Если вариантов несколько
$s = 70;
if ($s < 45) echo "bronze", "\n";
elseif ($s < 75) echo "silver", "\n";
elseif ($s < 125) echo "gold", "\n";
else echo "VIP", "\n";