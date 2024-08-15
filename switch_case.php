<?php
//Операторы SWITCH/CASE для сравнения переменной с чем либо 
require_once "function_n.php";

nStr("Switch/case");
$role = "user";

switch ($role){
    case "admin":
        echo "full control", "\n";
        break;
    case "moderator":
        echo "manage articles and comments", "\n";
        break;
    case "user":
        echo "write comments to articles", "\n";
        break;
    default:
        echo "role is underfined", "\n";
}

$t = rand(0, 16);
switch ($t){
    case 1:
    case 2:
    case 3:
        echo "variable = 1 - 3", "\n";//Действие для первых трех проверок выполняется одно и то же
        break;
    case ($t >= 4 && $t <= 10):
        echo $t, "\n";
        break;
    default:
        echo "variable more than 10", "\n";
}

nStr("Match");
$r = rand(0, 5);
echo match ($r) {
    0 => "zero",
    1 => "one",
    2 => "two",
    3 => "three",
    4 => "four",
    5 => "maximum value",
    default => "invalid value",
};