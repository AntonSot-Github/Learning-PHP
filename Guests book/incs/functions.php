<?php

function dump(array | object $data): void
{
    echo "<pre>" . print_r($data, 1) . "</pre>";
}

//Проверка формы на наличие всех полей, созданных разработчиками, чтобы избежать подделки от пользователя
$fillable = ['name', 'email', 'password'];
function load(array $fillable, $post = true): array
{
    $load_data = $post ? $_POST : $_GET;
    $data = [];
    foreach ($fillable as $field) {
        if (isset($load_data[$field])){
            $data[$field] = trim($load_data[$field]);
        } else {
            $data[$field] = '';
        }
    }
    return $data;
}

//'Обёртка' функции htmlspecialchars()
function h(string $s): string 
{
    return htmlspecialchars($s, ENT_QUOTES);
}

//Сохранение уже написанного в полях формы текста в случае возникновения ошибки
function old(string $name, $post = true): string 
{
    $load_data = $post ? $_POST : $_GET;
    return isset($load_data[$name]) ? h($load_data[$name]) : '';
}