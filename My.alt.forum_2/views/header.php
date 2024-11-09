<?php
    require_once __DIR__ . "/../incs/functions.php";

    if (isset($_GET['do']) && $_GET['do'] == 'logout'){
        unset($_SESSION['user']);
        header("Location: index.php");
        exit;
    }

    if(isset($_GET['do']) && $_GET['do'] == 'relogin'){
        unset($_SESSION['user']);
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Alternative forum 2 <?php if(isset($title)) echo ': ' . "$title" ?>
    </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="nav">
        <div class="nav__header-box">
            <a class="link" href="index.php"><h1>Alternative forum - Version 2</h1></a>
        </div>
        <div class="nav__box">
            <a href="#" class="link nav__link nav__themes">Topics for conversations</a>

            <div class="dropdown nav__user">

                <a 
                href="<?php if(!isset($_SESSION['user'])){ echo './login.php';} else {echo '#';}?>" 
                class="link dropbtn <?php if(isset($_SESSION['user'])){echo 'btn-user-menu';}?>">
                    <?php if(isset($_SESSION['user'])): ?>
                        <?php echo 'Hello, ' . "$userName"; ?><span></span>
                    <?php else : ?>
                        Login on site
                    <?php endif; ?>
                </a>
                    
                <?php if(isset($_SESSION['user'])): ?>
                    <div class="dropdown-content">
                        <a class="dropdown-content__a" href="?do=relogin">Relogin</a>
                        <a class="dropdown-content__a" href="#">Your account</a>
                        <a class="dropdown-content__a" href="?do=logout">Logout</a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>