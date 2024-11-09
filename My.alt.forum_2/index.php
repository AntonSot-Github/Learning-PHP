<?php
    require_once __DIR__ . "/incs/functions.php";
    
    $title = 'main';
    $topics = [];

   

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['topicName']) && !empty($_POST['topicName'])){
            createTopic($_SESSION['user_id'], $_POST['topicName']);
        }
    }
?>




<?php require_once __DIR__ . "/views/header.php" ?>

    <div class="container">
        <?php if(empty($topics)): ?>
            <div class="msg 
            <?php echo ((isset($_GET['do']) && $_GET['do'] == 'createTopic') ? 'no-display' : 'display')?>">

                <p>There are no any conversations yet</p>
                <a class="link btn btn-grad btn-msg" href="?do=createTopic">Create a new topic</a>
            </div>
        <?php endif; ?>

        <div class="form-topic <?php echo ((isset($_GET['do']) && $_GET['do'] == 'createTopic') ? 'display' : 'no-display')?>">

            <?php if(isset($_SESSION['user'])): ?>
                <div class="form-topic__box">
                    <form method="post" >
                        
                        <label for="topicName">You can create a new topic</label>
                        <input class="form-input form-input__topic" type="text" name="topicName" id="topicName" placeholder="Name of topic">                        
                        <label for="postMsg">Your message</label>
                        <textarea name="postMsg" id="postMsg" placeholder="Message here"></textarea>
                        <button class="btn btn-grad btn-topic" type="submit">Create topic</button>
                    </form>
                </div>

            <?php else: ?>
                    <p>Only autorized users can create new topics. Please log in to our website
                        <em><a class="link link-underlining_left-to-right link__reg" href="login.php">Login</a></em>
                    </p>
            <?php endif; ?>

        </div>



    </div>

<?php require_once __DIR__ . "/views/footer.php" ?>