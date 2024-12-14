<?php
session_start();
require_once __DIR__ . "/db.php";


if(isset($_SESSION['user'])){
    $userName = $_SESSION['user'];
}

function dump($data){
    echo "<pre>" . print_r($data, 1) . "</pre>";
}

//Checking fields of form
$reqFields = ['name', 'password', 'email'];
function checkField(array $reqFields, $post = true): array
{
    $arrData = ($post) ? $_POST : $_GET;
    $checkedData = [];
    foreach ($reqFields as $field){
        if ($arrData[$field]){
            $checkedData[$field] = trim(strip_tags($arrData[$field]));
        } else {
            $checkedData[$field] = '';
        }
    }
    return $checkedData; 
}

//Checking length and presence of only numbers in name and password
function checkNaPa($data): bool 
{
    if ((strlen($data) <= 2 || strlen($data) > 25 || ctype_digit($data))){
        return false;
    } else {
        return true;
    }

}

//registration of new user
 function registration($name, $password, $email): bool
 {
     global $db;
     $expression = mysqli_prepare($db, "INSERT INTO users (name, password, email) VALUES (?, ?, ?)");

     if (mysqli_stmt_execute($expression, [$name, $password, $email])){
        $_SESSION['success_reg'] = 'You have successfully registered!';
        header("Location: login.php");
        return true;
     } else {
        return false;
     };

 }

//Autorization
function login($name, $logPass): bool 
{
    global $db;    
    // Подготавливаем SQL-запрос для выбора пользователя по имени
    $stmt = mysqli_prepare($db, "SELECT * FROM `users` WHERE name = ?");
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    // Извлекаем данные пользователя
    $user = mysqli_fetch_assoc($res);    
    
    // Проверяем пароль
    if ($user && password_verify($logPass, $user['password'])){
        $_SESSION['user'] = $user['name'];
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_reg_date'] = $user['reg_time_at'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_ava'] = $user['avatar'];
        if(!empty($user['tel'])){
            $_SESSION['user_tel'] = $user['tel'];
        }
        return true;
    } else {
        return false;
    }
}

//Topic add
function createTopic($userId, $topicName): bool
{
    global $db;
    $stmt = mysqli_prepare($db, "INSERT INTO `topics` (by_user_id, topic_name) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "is", $userId, $topicName);
     
    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        return false;
    }
}

//Topic Id from DB
function findId($topics, $topicName){
    foreach ($topics as $index => $topic){
        if($topic == $topicName){
            return $index;
        }
    }
};


//Post-text add
function publicPost($topicId, $postText, $picturePath): bool 
{
    global $db;
    $stmt = mysqli_prepare($db, "INSERT INTO `posts` (by_user_id, from_topic_id, post_text, picture) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "iiss", $_SESSION['user_id'], $topicId, $postText, $picturePath);
    if(mysqli_stmt_execute($stmt)){
        return true;
    } else {
        return false;
    }
}

/* 
Array
(
    [user_id] => 48
    [name] => Garrett Grant
    [tel] => 
    [password] => $2y$10$emfsoX2L2UqSHdRBD9/aK.RhR7hbdCSPLQouBYs/wwql6d9rn7QGu
    [email] => xefaneba@mailinator.com
    [role] => 2
    [reg_time_at] => 2024-11-04 19:19:42
)
*/