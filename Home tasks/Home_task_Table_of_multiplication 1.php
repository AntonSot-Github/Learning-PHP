<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home task - Table of multiplication</title>
    <style>        
        table{
            margin: 0 auto;
            text-align: center;
            width: 90vw;            
            border-collapse: collapse;
            border: 2px solid black;
        }
        caption{
            border: 2px solid black;
            padding: 3px;
            font-size: 25px;
            border-bottom: none;
        }
        /* Обращение ко всем потомкам, кроме b */
        table * :not(b, span){
            border: 1px solid black;
            padding: 3px;
        }
    </style>
</head>
<body>
    <table>
    <caption><b>Multiplication table</b></caption>
    <?php
        echo '<tr>';
        for($n = 1; $n <= 10; $n++){
            echo "<th>Multiplication by<br><span>{$n}</span></th>";
        }
        echo '</tr>';
        for($k = 1; $k <= 10; $k++){            
            echo '<tr>';
            for($i = 1; $i <= 10; $i++){
                echo "<td>{$i} * {$k} = " . ($k * $i) ."</td>";
            }
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>
