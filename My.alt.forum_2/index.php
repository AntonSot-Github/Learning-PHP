<?php
session_start();
require_once __DIR__ . "/incs/db.php";
require_once __DIR__ . "/incs/functions.php";

//dump ($_SERVER);

//registration of new user
function registration($name, $password, $email){
    global $db;
    $expression = mysqli_prepare($db, "INSERT INTO users (name, password, email) VALUES (?, ?, ?)");
    $res = mysqli_stmt_execute($expression, [$name, $password, $email]);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['email'])){
        $name = $_POST['name'];
        $_SESSION['user']['name'] = $name;
        $password = $_POST['password'];
        $email = $_POST['email'];
        registration($name, $password, $email);
        unset($_POST);
        $_SESSION['success']['registration'] = 'You have successfully registered';

        } else {
            $_SESSION['errors']['reg_error'] = 'Enter your nickname, password and email';
            header("Location: index.php");
            exit;
        }
} 
//print_r($_SESSION['errors']['reg_error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alternative forum 2</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="nav">
        <div class="nav__header-box">
            <h1>Alternative forum - Version 2</h1>
        </div>
        <div class="nav__box">
            <a href="#" class="nav__link nav__themes">Themes for conversations</a>
            <a href="#" class="nav__link nav__sites">Choose the site</a>
            <a href="#" class="nav__link nav__user">User</a>
        </div>
    </div>
    <div class="container">

        <div class="form-registration">
            <?php if(isset($_SESSION['errors']['reg_error'])): ?>
                <div class="form-registration__error <?php if($_SESSION['errors']['reg_error']) echo 'width-30%' ?>">
                    <p><?php echo ($_SESSION['errors']['reg_error']) ?></p>
                </div>
                <?php unset($_SESSION['errors']['reg_error']) ?> 
            <?php endif; ?>
            <form method="post">
                <input class="form-input form-input__name" type="name" name="name" placeholder="Your name">                
                <input class="form-input form-input__password" type="password" name="password" placeholder="Your password">
                <input class="form-input form-input__email" type="email" name="email" placeholder="Your email">
                <button class="btn" type="submit"><span>Registration</span></button>
            </form>
        </div>
    </div>
    <footer>
        <h2>WELCOME!</h2>
    </footer>
</body>
</html>