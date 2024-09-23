
<?php
echo (date('Y-m-d H:i:s', 1669324282)), "\n";
echo (date('Y-m-d H:i:s', 1643058682)), "\n";
echo (date('Y-m-d H:i:s', 1632514282)), "\n";
1632514282






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions for Date and time</title>
    <style>
        .wrapper{
            width: 60%;
            margin: 0 auto;
        }
        h1{
            text-align: center;
            font-size: 40px;
        }
        p{
            font-size: 20px;
            margin-bottom: 10px;
        }
        span {
            font-size: 23px;
            letter-spacing: 1.3px;
        }
        pre{
            font-size: 20px;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Functions for Date and time</h1>
        <p>Function <span><b><i>time()</i></b></span>: <?php var_dump (time()); ?></p>
        <p>Function <span><b><i>date()</i></b></span>: <?php var_dump (date('Y-m-d H:i:s', time())); ?></p>
        <p>Function <span><b><i>date_default_timezone_get()</i></b></span>: <?= var_dump(date_default_timezone_get())?> </p>
        <p>Function <span><b><i>date_default_timezone_set('Europe/Kyiv')</i></b></span>: <?= var_dump(date_default_timezone_set('Europe/Kyiv')); echo " => "; var_dump(date('Y-m-d H:i:s', time())) ?></p>
        <p style="margin-bottom: 0">Function <span><b><i>strtotime()</i></b></span>: <pre> 
                strtotime('now') => <?php echo (strtotime('now')), " => ", date('Y-m-d H:i:s', strtotime('now')), "\n"; ?>
                strtotime("10 September 2000") => <?php echo (strtotime("10 September 2000")), "\n"; ?>
                strtotime("+1 day") => <?php echo (strtotime("+1 day")), " => ", date('Y-m-d H:i:s', strtotime("+1 day")), "\n"; ?>
                strtotime("+1 week 2 days 4 hours 2 seconds") => <?php echo (strtotime("+1 week 2 days 4 hours 2 seconds")), " => ", date('Y-m-d H:i:s', strtotime("+1 week 2 days 4 hours 2 seconds")), "\n"; ?>
                strtotime("+1 week", 1669324282) => <?php echo (strtotime("+1 week", 1669324282)), " => ", date('Y-m-d H:i:s', strtotime("+1 week", 1669324282)), "\n"; ?>
                strtotime("10 September 2000") => <?php echo (strtotime("10 September 2000")), " => ",date('Y-m-d H:i:s', strtotime("10 September 2000")), "\n"; ?>
                strtotime("-1 year -2 months", 968533200) => <?php echo (strtotime("-1 year -2 months", 968533200)), " => ", date('Y-m-d H:i:s', strtotime("-1 year -2 months", 968533200)), "\n"; ?>


        </pre></p>

    </div>

</body>
</html>