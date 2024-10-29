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
    //COUNT(*): возвращает одно число (0 или 1), что минимизирует нагрузку на сервер.
    //SELECT *: возвращает все данные, связанные с пользователем, что делает запрос более "тяжелым".
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
    //сохраняем данные пользователя в сессию для дальнейшего использования(кроме пароля)
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
    $_SESSION['success'] = 'Message has been added';
    return true;
}

function edit_message(array $data): bool
{
    global $dbh;
    if (!check_adm()) {
        $_SESSION['errors'] = 'Forbidden';
        return false;
    }
    $stmt = $dbh->prepare("UPDATE messages SET message = ? WHERE id = ?");
    $stmt->execute([$data['message'], $data['id']]);
    $_SESSION['success'] = 'The message has been saved';
    return true;
}

function get_messages(int $start, int $per_page):array
{
    global $dbh;
    $where = '';
    if (!check_adm()) {
        $where = 'WHERE status = 1';
    }
    //Используем оператор JOIN для объединения таблиц, добавляя к таблице message столбец name по столбцам id в users и user_id в messages
    //Записываем через запятую все поля, которые хотим видеть в массиве $messages
    //Также форматируем вывод времени создания сообщения: указываем столбец с временем(messages.created_at), а затем эл-т массива(created_at2), куда вернуть отформатированное значение
    //FROM messages m - это псевдоним таблицы message
    //ORDER BY id DESC - упорядочить сообщения по дате
    $stmt = $dbh->prepare("SELECT m.id, m.user_id, m.message, m.status, DATE_FORMAT(m.created_at, '%d/%m/%Y %H:%i') AS created_at2, users.name FROM messages m JOIN users ON users.id = m.user_id {$where} ORDER BY id DESC LIMIT $start, $per_page");
    $stmt->execute();
    return $stmt->fetchAll();
}

//Считает, сколько у нас всего сообщений
function get_count_messages(): int
{
    global $dbh;
    $where = '';
    if (!check_adm()) {
        $where = 'WHERE status = 1';
    }
    //не берем данные извне, поэтому используем ф-цию query
    $res = $dbh->query("SELECT COUNT(*) FROM messages {$where}");
    return $res->fetchColumn();//возвращает одну колонку
}

//Измение админом статуса сообщений
function toggle_message_status(int $status, int $id): bool
{
    global $dbh;
    if (!check_adm()){
        $_SESSION['errors'] = 'Forbidden';
        return false;
    }
    $status = $status ? 1 : 0;
    $stmt = $dbh->prepare("UPDATE messages SET status = ? WHERE id = ?");
    return $stmt->execute([$status, $id]);
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
