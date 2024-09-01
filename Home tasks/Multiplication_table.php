
<?php
$k1 = " * 1 = ";
$k2 = " * 2 = ";
$k3 = " * 3 = ";
$k4 = " * 4 = ";
$k5 = " * 5 = ";
$k6 = " * 6 = ";
$k7 = " * 7 = ";
$k8 = " * 8 = ";
$k9 = " * 9 = ";
$k10 = " * 10 = ";
$a = 1;
$b = 2;
$c = 3;
$d = 4;
$e = 5;
$f = 6;
$g = 7;
$h = 8;
$i = 9;
$j = 10;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-size: 20px;            
        }

        div{
            width: 100%;
        }
        table{
            margin: 0 auto;
            border: 2px solid black;
            border-top: none;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        caption{
            border: 2px solid black;
            border-bottom: none;
        }
        thead{
            border: 2px solid black;
        }        
        th{
            border: 1px solid black;
            border-collapse: collapse;
            border-spacing: 2px;
            padding: 5px;
            line-height: 25px;
        }
        span{
            font-size: 25;
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div>
        <table>
            <caption>Multiplication table</caption>
            <thead>
                <th>Multiplication by<br> <span>1</span></th>
                <th>Multiplication by<br> <span>2</span></th>
                <th>Multiplication by<br> <span>3</span></th>
                <th>Multiplication by<br> <span>4</span></th>
                <th>Multiplication by<br> <span>5</span></th>
            </thead>
            <tbody>
                <tr>
                    <th>
                    <?php echo $a.$k1. 1 * $a,"<br>", $a.$k2. 1 * $b,"<br>",$a.$k3. 1 * $c,"<br>",
                            $a.$k4. 1 * $d,"<br>",$a.$k5. 1 * $e,"<br>",$a.$k6. 1 * $f,"<br>",$a.$k7. 1 * $g,"<br>",
                            $a.$k8. 1 * $h,"<br>",$a.$k9. 1 * $i,"<br>",$a.$k10. 1 * $j?>
                    </th>

                    <th>
                        <?php echo $b.$k1. $b * $a,"<br>", $b.$k2. $b * $b,"<br>",$b.$k3. $b * $c,"<br>",
                                $b.$k4. $b * $d,"<br>",$b.$k5. $b * $e,"<br>",$b.$k6. $b * $f,"<br>",$b.$k7. $b * $g,
                                "<br>",$b.$k8. $b * $h,"<br>",$b.$k9. $b * $i,"<br>",$b.$k10. $b * $j?>
                    </th>

                    <th>
                    <?php echo $c.$k1. $c * $a,"<br>", $c.$k2. $c * $b,"<br>",$c.$k3. $c * $c,"<br>",
                                $c.$k4. $c * $d,"<br>",$c.$k5. $c * $e,"<br>",$c.$k6. $c * $f,"<br>",$c.$k7. $c * $g,
                                "<br>",$c.$k8. $c * $h,"<br>",$c.$k9. $c * $i,"<br>",$c.$k10. $c * $j?>
                    </th>

                    <th>
                    <?php echo $d.$k1. $d * $a,"<br>", $d.$k2. $d * $b,"<br>",$d.$k3. $d * $c,"<br>",
                                $d.$k4. $d * $d,"<br>",$d.$k5. $d * $e,"<br>",$d.$k6. $d * $f,"<br>",$d.$k7. $d * $g,
                                "<br>",$d.$k8. $d * $h,"<br>",$d.$k9. $d * $i,"<br>",$d.$k10. $d * $j?>
                    </th>

                    <th>
                    <?php echo $e.$k1. $e * $a,"<br>", $e.$k2. $e * $b,"<br>",$e.$k3. $e * $c,"<br>",
                                $e.$k4. $e * $d,"<br>",$e.$k5. $e * $e,"<br>",$e.$k6. $e * $f,"<br>",$e.$k7. $e * $g,
                                "<br>",$e.$k8. $e * $h,"<br>",$e.$k9. $e * $i,"<br>",$e.$k10. $e * $j?>
                    </th>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th>Multiplication by<br> <span>6</span></th>
                    <th>Multiplication by<br> <span>7</span></th>
                    <th>Multiplication by<br> <span>8</span></th>
                    <th>Multiplication by<br> <span>9</span></th>
                    <th>Multiplication by<br> <span>10</span></th>
                </tr>
            </tbody>
            <tbody>
            <tr>
                    <th>
                    <?php echo $f.$k1. $f * $a,"<br>", $f.$k2. $f * $b,"<br>",$f.$k3. $f * $c,"<br>",
                            $f.$k4. $f * $d,"<br>",$f.$k5. $f * $e,"<br>",$f.$k6. $f * $f,"<br>",$f.$k7. $f * $g,"<br>",
                            $f.$k8. $f * $h,"<br>",$f.$k9. $f * $i,"<br>",$f.$k10. $f * $j?>
                    </th>

                    <th>
                        <?php echo $g.$k1. $g * $a,"<br>", $g.$k2. $g * $b,"<br>",$g.$k3. $g * $c,"<br>",
                                $g.$k4. $g * $d,"<br>",$g.$k5. $g * $e,"<br>",$g.$k6. $g * $f,"<br>",$g.$k7. $g * $g,
                                "<br>",$g.$k8. $g * $h,"<br>",$g.$k9. $g * $i,"<br>",$g.$k10. $g * $j?>
                    </th>

                    <th>
                    <?php echo $h.$k1. $h * $a,"<br>", $h.$k2. $h * $b,"<br>",$h.$k3. $h * $c,"<br>",
                                $h.$k4. $h * $d,"<br>",$h.$k5. $h * $e,"<br>",$h.$k6. $h * $f,"<br>",$h.$k7. $h * $g,
                                "<br>",$h.$k8. $h * $h,"<br>",$h.$k9. $h * $i,"<br>",$h.$k10. $h * $j?>
                    </th>

                    <th>
                    <?php echo $i.$k1. $i * $a,"<br>", $i.$k2. $i * $b,"<br>",$i.$k3. $i * $c,"<br>",
                                $i.$k4. $i * $d,"<br>",$i.$k5. $i * $e,"<br>",$i.$k6. $i * $f,"<br>",$i.$k7. $i * $g,
                                "<br>",$i.$k8. $i * $h,"<br>",$i.$k9. $i * $i,"<br>",$i.$k10. $i * $j?>
                    </th>

                    <th>
                    <?php echo $j.$k1. $j * $a,"<br>", $j.$k2. $j * $b,"<br>",$j.$k3. $j * $c,"<br>",
                                $j.$k4. $j * $d,"<br>",$j.$k5. $j * $e,"<br>",$j.$k6. $j * $f,"<br>",$j.$k7. $j * $g,
                                "<br>",$j.$k8. $j * $h,"<br>",$j.$k9. $j * $i,"<br>",$j.$k10. $j * $j?>
                    </th>
                </tr>
            </tbody>
        </table>
        <?php echo "<hr>" ?>
    </div>
</body>
</html>