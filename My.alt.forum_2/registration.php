<?php

require_once __DIR__ . "/incs/functions.php";

$title = 'registration';

if(isset($_SESSION['user'])){
    header("Location: index.php");
    exit;
}

//dump ($_SERVER);


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $readyData = checkField(['name', 'password', 'email']);
    if (!empty($readyData['name']) && !empty($readyData['password']) && !empty($readyData['email'])){

        $name = $readyData['name'];
        if (!checkNaPa($name)){
            $_SESSION['errors'] = 'Please, enter your nickname correctly';
            header("Location: registration.php");
            exit;
        }        
        $_SESSION['user_name'] = $readyData['name'];
        if (isset($name)){
            $sqlCheckName = mysqli_query($db, "SELECT * FROM `users` WHERE name = '$name'");
            if(mysqli_num_rows($sqlCheckName) !== 0){
                $_SESSION['user_name'] = $name;
                $_SESSION['errors'] = 'This name is already uses';
                header("Location: registration.php");
                exit;
            }
        }
        
        if (checkNaPa($readyData['password'])) 
            {
            $password = password_hash($readyData['password'], PASSWORD_DEFAULT);
            } 
        else {
            
            $_SESSION['errors'] = 'Please, enter the password correctly';
            header("Location: registration.php");
            exit;
        }
        
        //Chacking email and it's validation 
        if (filter_var($readyData['email'], FILTER_VALIDATE_EMAIL)){
            // Присваиваем переменной $email проверенное значение из массива $readyData
            $email = $readyData['email'];
            // Отправляем SQL-запрос в базу данных для проверки, существует ли уже пользователь с этим email
            $sqlCheckEmail = mysqli_query($db, "SELECT * FROM `users` WHERE `email` = '$email'");
            // Проверяем, найден ли email в базе данных, используя функцию mysqli_num_rows()
            if (!(mysqli_num_rows($sqlCheckEmail) == 0)){
                // Если email найден, сохраняем его в сессии для потенциального использования
                $_SESSION['user_email'] = $readyData['email'];
                // Сохраняем сообщение об ошибке в сессии
                $_SESSION['errors'] = 'User with this email is already registered';
                header("Location: registration.php");
                exit;
            }
        } else {
            // Если email не прошел валидацию, сохраняем его в сессии и фиксируем ошибку
            $_SESSION['user_email'] = $readyData['email'];
            $_SESSION['errors'] = "Please, enter your email correctly";
            header("Location: registration.php");
            exit;
        }


        registration($name, $password, $email);
        
        } else {
            $_SESSION['errors'] = 'Please, enter your nickname, password and email correctly';
            header("Location: registration.php");
            exit;
        }
} 
//print_r($_SESSION['errors']['reg_error']);

?>

<?php require_once __DIR__ . "/views/header.php" ?>
    <div class="container">

        <div class="form-registration">

            <!-- Message about error with registration -->
            <?php if(isset($_SESSION['errors'])): ?>
                <div class="form-registration__error">
                    <p><?php echo ($_SESSION['errors']) ?></p>
                </div>
                <?php unset($_SESSION['errors']) ?> 
            <?php endif; ?>

            <!-- Form for registration -->
            <form method="post">

                
                <div>
                    <input class="form-input form-input__name" type="name" name="name" placeholder="Your name"
                     value = "<?php if (isset($_SESSION['user_name'])){
                        echo ($_SESSION['user_name']);
                        unset($_SESSION['user_name']);
                        } ?>">
                </div>

                <div>
                    <input class="form-input form-input__password" type="password" name="password" placeholder="Your password">
                </div>

                <div>
                    <input class="form-input form-input__email" type="email" name="email" placeholder="Your email"
                    value = "<?php if(isset($_SESSION['user_email'])){
                        echo $_SESSION['user_email'];
                        unset($_SESSION['user_email']);
                        } ?>">
                </div>
                <button class="btn btn-grad" type="submit">Registration</button>
            </form>

        </div>
    </div>
<?php require_once __DIR__ . "/views/footer.php" ?>