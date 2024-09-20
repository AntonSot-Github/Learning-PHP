<?php

$count = file_get_contents("Help_files_PHP/count.txt");

$count += 1;

file_put_contents("Help_files_PHP/count.txt", $count);

setcookie('QuentetyOfEnters', $count);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counter of visits</title>
    <style>
        .wrapper{
            width: 50%;
            margin: 0 auto;
        }
        h1{
            font-size: 40px;
            margin-bottom: 20px;
            text-align: center;
        }
        p{
            font-size: 20px;

        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Counter of visits</h1>
        <p>Quentity of visits: <?php echo($_COOKIE['QuentetyOfEnters']) ?></p>
        <a href="Help_files_PHP/setcookie.php">Setcookie</a>
    </div>
</body>
</html>

