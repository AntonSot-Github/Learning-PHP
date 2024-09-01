<?php  
    const USER_NAME = "Name: ";
    const MESSAGE_SEP = "--##--"; //переменная-разделитель между сообщениями
    const MESSAGE_PARTS = "--**--"; //переменная-разделитель частей сообщений

    function dump($data){
        echo "<pre>" . print_r($data, 1) . "</pre>";
    }

    
    if(!empty($_POST)){
        //создаём условие, при котором запись в файл осуществляется только в случае,
        //если польщователь ввел данные в оба поля формы
        if($_POST['name'] != "" && $_POST['message'] != ""){
            $messageText = USER_NAME . $_POST['name'] . MESSAGE_PARTS . "Message: " . $_POST['message'] . PHP_EOL . MESSAGE_SEP;
            // Заменяем перенос строки \n на разрыв строки html - <br>
            //Но перед этим избавляемся от html тэгов 
            $message = str_replace("\n", "<br>", htmlspecialchars($messageText));
        }        
        file_put_contents(__DIR__ . '/Help_files_PHP/messages.txt', $message, FILE_APPEND);
        header("Location: GET_POST_practice.php");
        die;
    }
?>
<?php 
    $file = __DIR__ . '/Help_files_PHP/messages.txt';
    if(file_exists($file)){
        $data = file_get_contents($file);        
    }
    
    //Создаем массив из строки, полученной функцией file_get_contents($file)
    if(file_exists($file)){
        $data = trim(file_get_contents($file));//удаляем пробелы 
        $arrFromFile = array_reverse(explode(MESSAGE_SEP, $data));
        
        /* dump($arrFromFile) */;//выводим реверсированный массив, чтобы последние сообщения выводились первыми
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Form-Example</title>
    <style>
        body{
            height: 125vw;
        }
        h1{
            text-align: center;
        }
        .form-wrapper{
            display: flex;
            justify-content: center;
            width: 100vw;
            background-color: pink;
            padding-top: 25px;
            margin-bottom: 30px;
        }
        form{
            width: 50%;
        }
        .card{
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h1>Form-Example</h1>
    <div class="form-wrapper">
        <form action="" method="post">

            <div class="mb-3 ">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" placeholder="Name" name="name">
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="3"  placeholder="Your text is here" name="message"></textarea>
            </div>

            <button type="submit" class="btn btn-primary mb-3">
                Send
            </button>
            
        </form>
    </div>

    <hr>
    <!-- Проверяем, существует ли массив -->
    <?php if(!empty($arrFromFile)): ?>
        <!-- Перебираем массив и выводим, чтобы вывести каждое сообщение в нужнои нам виде -->
        <?php foreach($arrFromFile as $message): ?>
            <?php if($message): ?>
                <!-- Делаем из строки message массив $data -->
                <?php $data = explode(MESSAGE_PARTS, $message)?>                    
    
                    <div class="card mb-5" style="width:70vw">
                        <div class="card-header">
                            <?= $data[0] ?>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p><?= $data[1] ?></p>            
                            </blockquote>
                        </div>
                    </div>
                
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

