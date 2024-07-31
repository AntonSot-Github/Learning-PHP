<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
    </style>
</head>
<body>
    
    <h1>Header 1</h1>

    <?php
        echo '<h2> Header 2</h2>';    
    ?>

    <?= '<h3>Header 3</h3>';?>

</body>
</html>