<?php
    require_once __DIR__ . "/../incs/functions.php";

    if (isset($_GET['do']) && $_GET['do'] == 'logout'){
        session_destroy();
        header("Location: index.php");
        exit;
    }

    if(isset($_GET['do']) && $_GET['do'] == 'relogin'){
        session_destroy();
        header("Location: login.php");
        exit;
    }

    if($db) {
        $mysqlTopic = mysqli_prepare($db, "SELECT  topic_name, id FROM topics");   
        mysqli_execute($mysqlTopic);
        $resTopic = mysqli_stmt_get_result($mysqlTopic);
        $topics = array_column(mysqli_fetch_all($resTopic, MYSQLI_ASSOC), 'topic_name', 'id');
        //dump($topics);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Alternative forum 2<?php if(isset($title)) echo ': ' . "$title" ?>
    </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="nav">
        <div class="nav__header-box">
            <a class="link" href="index.php"><h1>Alternative forum - Version 2</h1></a>
        </div>
        <div class="nav__box">
            
            <div class="nav__topics">
                <a href="#" class="link nav__link nav__themes nav__topics-link">Three last topics</a>
                <?php if (!empty($topics)): ?>

                    <ul class="nav__topics-box">
                        <?php foreach($topics as $index => $topic): ?>
                            <?php if (count($topics) > 3) {
                                if($index == array_key_last($topics) || $index == (array_key_last($topics) - 1) || $index == (array_key_last($topics) - 2)){
                                    echo '<li><a href="#">'. $topic . '</a></li>';
                                }
                            } else {
                                echo '<li><a href="#">'. $topic . '</a></li>';
                            }?>
                        <?php endforeach; ?>
                    </ul>

                <?php endif; ?>
            </div>
            

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
                        <a class="dropdown-content__a account-link" href="#">Your account</a>
                        <a class="dropdown-content__a" href="?do=logout">Logout</a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>