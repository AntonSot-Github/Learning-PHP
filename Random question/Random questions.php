

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random question PHP</title>
    <style>
        h1{
            text-align: center;
            color: green;
            text-decoration: underline;
        }
        hr{
            color: green; 
            border: 2px solid green; 
        }
        p{
            font-size: 30px;
            vertical-align: 50%
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Random question PHP</h1>
        <hr>
        <p>
            <?php 
                function randQuest(){
                    require_once 'Questions.php';
                    echo $questions[rand(0, (count($questions) - 1))];
                }
                randQuest();
            ?>
        </p>
    </div>
    
</body>
</html>