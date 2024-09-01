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
        hr{
            color: green;
            width: 95%;
            border: 2px dotted red;            
        }
    </style>
</head>
<body>
    <!-- Задание: написать функцию, принимающую 2 аргумета, обозначающих диапозон множителей таблицы умножения -->
    <table>
    <caption><b>Multiplication table</b></caption>
    <?php
        function table($n, $m){
            echo '<tr>';
            for($f = $n; $f <= $m; $f++){
                echo "<th>Multiplication by<br><span>{$f}</span></th>";
            }
            echo '</tr>';
            for($g = 1; $g <= 10; $g++){//Количество строк или множителей(строит ячейки по вертикали)
                echo '<tr>';
                
                for($i = $n; $i <= $m; $i++){//Количество столбцов или множимых(строит ячейки по горизонтали)
                    
                    echo "<td>{$i} * {$g} = " . ($g * $i) ."</td>";
                }
                echo "</tr>";
            } 
        }
        table(6, 9);
    ?>
    </table>
    <hr>
    <?php 
    //Пример от преподавателя
    echo get_mult_table();


    echo get_mult_table(10, 10);

    function my_header($tr, $td)
    {
        echo "<h3>Таблица умножения {$tr}x{$td}</h3>";
    }

    function get_mult_table($tr = 9, $td = 9)
    {
        my_header($tr, $td);
        $table = "<table border='1' width='100%'>";

        for ($i = 2; $i <= $tr; $i++) {
            $table .= '<tr>';
            for ($j = 2; $j <= $td; $j++) {
                $table .= "<td>$j * $i = " . $j * $i . "</td>";
            }
            $table .= '</tr>';
        }

        $table .= "</table>";
        return $table;
    }
    ?>

</body>
</html>
