<?php
session_start();
require_once __DIR__ . "/incs/db.php";
require_once __DIR__ . "/incs/functions.php";

//dump ($_SERVER);


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $readyData = checkField(['name', 'password', 'email']);
    if (!empty($readyData['name']) && !empty($readyData['password']) && !empty($readyData['email'])){

        $name = $readyData['name'];
        if (!checkNaPa($name)){
            $_SESSION['errors']['reg_error'] = 'Please, enter your nickname correctly';
            header("Location: index.php");
            exit;
        }        
        $_SESSION['user']['name'] = $readyData['name'];

        if (checkNaPa($password)) 
            {
            $password = password_hash($readyData['password'], PASSWORD_DEFAULT);
            } 
        else {
            $_SESSION['errors']['reg_error'] = 'Please, enter the password correctly';
            header("Location: index.php");
            exit;
        }
        
        $email = $readyData['email'];
        registration($name, $password, $email);        
        $_SESSION['success']['registration'] = 'You have successfully registered!';
        
        header("Location: index.php");
        exit;
        } else {
            $_SESSION['errors']['reg_error'] = 'Please, enter your nickname, password and email correctly';
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

            <!-- Message about success with registration  -->
            <?php if(isset($_SESSION['success']['registration'])): ?>
                <div class="form-registration__success <?php if($_SESSION['success']['registration']) echo 'width-30' ?>">
                    <p><?php echo ($_SESSION['success']['registration']) ?></p>
                </div>
                <?php unset($_SESSION['success']['registration']) ?> 
            <?php endif; ?>

            <!-- Message about error with registration -->
            <?php if(isset($_SESSION['errors']['reg_error'])): ?>
                <div class="form-registration__error <?php if($_SESSION['errors']['reg_error']) echo 'width-30' ?>">
                    <p><?php echo ($_SESSION['errors']['reg_error']) ?></p>
                </div>
                <?php unset($_SESSION['errors']['reg_error']) ?> 
            <?php endif; ?>

            <!-- Form for registration -->
            <form method="post">
                <div>
                    <input class="form-input form-input__name" type="name" name="name" placeholder="Your name">
                </div>
                <div>
                    <input class="form-input form-input__password" type="password" name="password" placeholder="Your password">
                </div>
                <div>
                    <input class="form-input form-input__email" type="email" name="email" placeholder="Your email">
                </div>
                <button class="btn" type="submit"><span>Registration</span></button>
            </form>

        </div>
    </div>
    <footer>
        <h2>WELCOME!</h2>
    </footer>
</body>
</html>