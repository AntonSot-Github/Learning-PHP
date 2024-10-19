<?php 
session_start();
require_once __DIR__. '/php/functions.php';

function addMsg($data){
    $file = __DIR__ . '/php/messages.txt';
    file_put_contents($file, $data . ',', FILE_APPEND);
}

if(isset($_POST['message'])){
    $message = nl2br(htmlspecialchars(trim($_POST['message'])));
    addMsg($message);
    header("Location: index.php");
    exit;
}

$file = file_get_contents(__DIR__ . '/php/messages.txt');
$arrMsg = explode(",", $file);

/* print_r($arrMsg); */

if (isset($_GET['do']) && $_GET['do'] == 'delete'){
    $msg_id = $_GET['id'];    
    unset($arrMsg[$msg_id - 1]);
    $file = __DIR__ . '/php/messages.txt';
    file_put_contents($file, implode(',', $arrMsg));
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My alternative forum</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let msgEditBtn = document.querySelectorAll(".edit-btn");
            console.log(msgEditBtn);
            msgEditBtn.forEach(function(btn, index) {
                btn.addEventListener("click", function() {
            // Найдем родительский элемент message-box для данной кнопки
                let messageBox = btn.closest(".message-box");

            // Внутри этого message-box найдем элемент с классом msg-editor
                let editor = messageBox.querySelector(".msg-editor");

            // Тогглим класс только у этого элемента
                if (editor) {
                    editor.classList.toggle("non-display");
                    editor.classList.toggle("opacity-0");
                }
        });
    });
        })
    </script>
</head>
<body>
    <div class="container">
        <h2>Altenative forum</h2>
        <h1>WELCOME</h1>
        <?php foreach($arrMsg as $index => $item): ?>
            <?php if(!empty($item)): ?>            
                <div class="message-box">
                    <p class="message-number">Message - <?php echo ($index + 1) ?></p>
                    <p class="message"> <?= $item ?> </p>
                    <div class="message-edition" id="msg-<?php echo($index + 1)?>">
                        <a class="edit-btn" href="#">Edit</a>
                        <a href="#">Save</a>
                        <a href="?do=delete&id=<?php echo($index + 1) ?>">Delete</a>
                        
                    </div>
                    <div class="message-edition">
                        <textarea class="msg-editor message-edition-text non-display opacity-0" name="edit" id="message-edit-msg-<?php echo($index + 1)?>"><?php echo trim($item) ?></textarea>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

        <form class="message-text" method="post">
            <textarea name="message" id="mes-1" placeholder="Your message"></textarea>
            <input class="btn-inp" type="submit" value="Send the message">
            
        </form>

        
    </div>
     
</body>
</html>