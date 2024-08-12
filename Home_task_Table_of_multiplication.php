<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 100vw;
            /* border: 1; */
            border-collapse: collapse;
        }
        th{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <table>
    <caption>Multiplication table</caption>
    <?php 
        for($k = 1; $k <= 10; $k++){
            echo "<th>Multiplication by<br><span>{$k}</span></th>";
            echo "<tbody>";            
            for($i = 1; $i <= 10; $i++){
                echo "<tr><th>{$k} * {$i} = " . ($k * $i) ."</th></tr>";
            }
            echo "</tbody>";
        }
    ?>
    </table>
</body>
</html>
