




<?php require_once __DIR__ . "/views/header.php" ?>
    <div class="container">

        <div class="form-registration">
            
            <p>Don't have an account yet? <em><a class="link link-underlining_left-to-right link__reg" href="registration.php">Register, please</a></em></p>
            
            <form method="post">
                <input class="form-input form-input__password" type="password" name="password" placeholder="Your password">
                <input class="form-input form-input__email" type="email" name="email" placeholder="Your email">
                <button class="btn-log btn-grad" type="submit">Login</button>
            </form>

            
        </div>
    </div>
<?php require_once __DIR__ . "/views/footer.php" ?>