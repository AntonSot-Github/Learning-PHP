
<?php
    $title = 'Learning PHP';
    define("CONSTANT_NAME", "constant");
    $string = "PHP - personal home page";
    const CAR = "BYD";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            flex-direction: column;
            width: 80%;
        }
        h1{
            color: green;
            text-align: center;
            font-size: 90px;
        }
        h2{
            color: blue;
            font-size: 50px;
            text-align: center;
        }
        p{
            display: inline-block;
            color: purple;
            font-size: 30px;            
            min-width: min-content;
        }
    </style>
</head>
<body>
    
    <h1>Header 1</h1>

    <?php
        echo '<h2> Header 2</h2>';    
    ?>

    <?= '<h3>Header 3</h3>';?>
    <?php echo CONSTANT_NAME , "\n"?>
    
    <?php echo "<p> $title </p>" ?>

    <?php echo "<p>$string</p>"; ?>

    <?php echo "<p> My car is ". CAR ." now</p>"?> 

</body>
</html>