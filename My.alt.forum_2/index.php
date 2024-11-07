<?php
    require_once __DIR__ . "/incs/functions.php";
    
    $title = 'main';
    $topics = [];


?>




<?php require_once __DIR__ . "/views/header.php" ?>

    <div class="container">
        <?php if(empty($topics)): ?>
            <div class="msg 
            <?php echo ((isset($_GET['do']) && $_GET['do'] == 'createTopic') ? 'no-display' : 'display')?>">

                <p>There is no any topics yet</p>
                <a class="link btn btn-grad btn-msg" href="?do=createTopic">Create new topic for conversation</a>
            </div>
        <?php endif; ?>

        <div class="topic <?php echo ((isset($_GET['do']) && $_GET['do'] == 'createTopic') ? 'display' : 'no-display')?>">

            <p>There is no any topics yet</p>

        </div>



    </div>

<?php require_once __DIR__ . "/views/footer.php" ?>