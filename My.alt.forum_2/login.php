<?php 
require_once __DIR__ . "/incs/functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (!empty($_POST['name']) && !empty($_POST['password'])){
        $name = $_POST['name'];
        $logPass = trim($_POST['password']);
        login($name, $logPass);

    }
}


?>


<?php require_once __DIR__ . "/views/header.php" ?>
    <div class="container">

        <div class="form-login">
            <?php if(isset($_SESSION['success_reg'])): ?>

                <!-- Message about success with registration  -->
                <div class="form-registration__success">
                    <p><?php echo ($_SESSION['success_reg']) ?></p>
                </div>
                <?php unset($_SESSION['success_reg']) ?> 


            <?php elseif(isset($_SESSION['error_log'])): ?>

                <div class="form-registration__error">
                    <p><?php echo ($_SESSION['error_log']) ?></p>
                </div>
                <?php unset($_SESSION['error_log']) ?> 
            <?php else: ?>
            
            <div class="form-registration__question">
                <p>Don't have an account yet? <em><a class="link link-underlining_left-to-right link__reg" href="registration.php">Register, please</a></em></p>
            </div>

            <?php endif; ?>
            
            <form method="post">
                <div>
                    <input class="form-input form-input__name" type="name" name="name" placeholder="Your name"
                     value = "<?php if (isset($_SESSION['user_name'])){
                        echo ($_SESSION['user_name']);
                        unset($_SESSION['user_name']);
                        } ?>">
                </div>
                <input class="form-input form-input__password" type="password" name="password" placeholder="Your password">
                <button class="btn-log btn-grad" type="submit">Login</button>
            </form>

            
        </div>
    </div>
<?php require_once __DIR__ . "/views/footer.php" ?>


<?php 

//dump($user);
?>