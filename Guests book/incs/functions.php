<?php

function dump(array | object $data): void
{
    echo "<pre>" . print_r($data, 1) . "</pre>";
}

//Проверка формы на наличие всех полей, созданных разработчиками, чтобы избежать подделки от пользователя
$fillable = ['name', 'email', 'password'];
function load (array $fillable, $post = true): array
{
    // Если $post равно true, то используем $_POST, иначе $_GET
    $load_data = $post ? $_POST : $_GET;
    $data = [];// Массив для сохранения данных из формы
    foreach ($fillable as $field) {
        // Если поле существует в $load_data, добавляем его в массив $data
        if (isset($load_data[$field])){
            $data[$field] = trim($load_data[$field]);
        } else {
            $data[$field] = '';// Если поле не существует, сохраняем пустую строку
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
function old (string $name, $post = true): string 
{
    $load_data = $post ? $_POST : $_GET;
    return isset($load_data[$name]) ? h($load_data[$name]) : '';
}

//Функция перенаправления
function redirect(string $url = ''): void
{
    header("Location: {$url}");
    exit;
}

//Функция для отображения ошибок в виде списка в html-документе
function get_errors(array $errors): string
{
    $html = '<ul class="list-unstyled">';//класс из bootstrap
    //двойной foreach, т.к. сначала отображаем упаковку ul для каждого элемента списка li 
    foreach ($errors as $error_group) {
        foreach ($error_group as $error) {
            $html .= "<li>{$error}</li>";
        }
    }
    $html .= '</ul>';
    return $html;
}

//Функция регистрации пользователей
function register(array $data): bool
{
    global $dbh; //обращение к БД
    //Подготавливаем запрос
    $stmt = $dbh->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    //выполняем подготовленный запрос
    $stmt->execute([$data['email']]);//$data в [], потому как в функции execute мы должны передать массив
    //Условие: если функция fetchColumn() возвращает 1(true - уже есть запись такого email) из столбца COUNT, то завершаем выполнение скрипта
    if ($stmt->fetchColumn()) {
        //записываем ошибку в глобальный массив $_SESSION
        $_SESSION['errors'] = 'This email is already used';
        //В случае ошибки завершаем работу функции с помощью return
        return false;
    }
    //Шифруем пароль, записываем значение в ключ "password" массива $data
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    //Если данные в форме указаны корректно, выполнение кода доходит до записи в БД:
    //готовим запрос на запись, используя именованные параметры для VALUES
    $stmt = $dbh->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    //выполняем подготовленный запрос
    $stmt->execute($data);
    //Записываем сообщение о регистрации в $_SESSION
    $_SESSION['success'] = 'You have successfully registered';
    return true;
}

//Функция логинизации для пользователя
function login (array $data): bool 
{
    global $dbh; //обращение к БД
    $stmt = $dbh->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$data['email']]);
     // Проверяем, вернула ли функция fetch() строку
     // Метод fetch() извлекает одну строку из результата запроса, перемещая "указатель" к следующей строке с каждым вызовом.
    if ($row = $stmt->fetch()){
        if (!password_verify($data['password'], $row['password'])){
            $_SESSION['errors'] = 'Wrong email';
            return false;
        }
    } else {
        $_SESSION['errors'] = 'Wrong email or password';
        return false;
    }
    //сохраняем данные пользователя в сессию длядальнейшего использования(кроме пароля)
    foreach ($row as $key => $value){
        if ($key != 'password') {
            $_SESSION['user'][$key] = $value;
        }
    }
    $_SESSION['success'] = 'You have successfully login';
    return true;
}

//Функция для сохранения сообщений от пользователей
function save_message(array $data): bool
{
    global $dbh;
    if (!check_auth()) {
        $_SESSION['errors'] = 'Login required';
        return false;
    }
    $stmt = $dbh->prepare("INSERT INTO messages (user_id, message) VALUES (?, ?)");
    $stmt->execute([$_SESSION['user']['id'], $data['message']]);
    $_SESSION['success'] = 'Message added';
    return true;
}

function get_messages():array
{
    global $dbh;
    $where = '';
    if (!check_adm()) {
        $where = 'WHERE status = 1';
    }
    $stmt = $dbh->prepare("SELECT * FROM messages {$where}");
    $stmt->execute();
    return $stmt->fetchAll();
}

//Функция проверки существования данного пользователя
//Функция isset() возвращает true или false, поэтому условие if не нужно
function check_auth():bool 
{
    return isset($_SESSION['user']);
}

//Проверка, является ли пользователь администратором
function check_adm():bool 
{
    return isset($_SESSION['user']) && $_SESSION['user']['role'] == 2;
}
