<?php
// вилка в коде

$n = 44;

if ($n % 2 === 0) {
    echo "Переменная even", "\n";
}
else {
    echo "Переменная odd", "\n";
}

if ($n % 2 === 0) echo "Переменная even", "\n";
else echo "Переменная odd", "\n";

// ==============================

$password = "sjsujs8sis9";
$email = "poseidongoogle.ua";

if (strlen($password) > 8) {
    echo "пароль...ок", "\n";
}
else {
    echo "пароль...не ок", "\n";
}
if (strripos($email, '@') !== false)  {
    echo "email...ок", "\n";
}
else {
    echo "email...не ок", "\n";
}

// Комбинация условий

$t = 546;
if ($t >= 40 AND $t <= 65) echo "горячая вода","\n";
if ($t <= -1 OR $t >= 101) echo "ошибка сигнала","\n";

