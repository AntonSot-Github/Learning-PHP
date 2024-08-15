<?php
//тернарный оператор

$resault = 6; 
$res;

$res = ($resault === 5) ? $res = 10 : $res = 15;
echo $res, "\n";

//another one example
$t = rand(0, 1);//генерирует случайное число от 0 до 1
echo $t ? 'true' : 'false', "\n";

$r = rand(0, 10);
echo $r, "\n";
echo ($r % 2 == 0) ?: "false", "\n";//возвращает 1, ксли условие - true

$u = 5;
echo $u ?: "false", "\n";//вернёт значение переменной - 5
echo is_int($u)?: "false", "\n";//вернёт 1
echo $g?? "doesn't exist", "\n";//doesn't exist