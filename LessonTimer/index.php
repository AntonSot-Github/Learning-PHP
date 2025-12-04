<?php

    if(file_exists(__DIR__ . "/db/db.php")){
        require_once __DIR__ . "/db/db.php";
    } else {
        echo "File of DB is not connected \n";
    }


    function getFullDate() 
    {
        $curDate = date('d-m-Y');
        $days = [
            1 => 'Monday',
            2 => 'Tuesday', 
            3 => 'Wednesday',
            4 => 'Thirthday',
            5 => 'Friday',
            6 => 'Saturday',
            7 => 'Sunday'
        ];
        return $days[date('N')] . " - " . $curDate;
    }
?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Timer of Lesson</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    

    <nav class="navbar bg-secondary">
    <div class="container-fluid">
        <h1 class="mx-auto text-white">Lesson's Timer</h1>
    </div>

    </nav>

    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col text-center">
                <p class="fs-3"><?= getFullDate() ?></p>
            </div>
            <div class="col text-center d-flex justify-content-center">
                <p class="fs-3 me-2" id="time"></p>
                
            </div>
        </div>

        <section class="d-flex flex-column align-items-center">
            <div class="timer mx-auto d-flex flex-row w-25 justify-content-center fs-3 align-items-end">
                <div ><p id="hours">00</p></div>
                <div><p> <span> : </span></p></div>
                <div ><p id="minuts">00</p></div>
                <div><p> <span> : </span></p></div>
                <div ><p id="seconds">00</p></div>
            </div>
            <div>
                <button id="btn-start" type="button" class="btn btn-primary btn-lg">Start</button>
                <button id="btn-pause" type="button" class="btn btn-secondary btn-lg">Pause</button>
            </div>
        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="js/js.js"></script>
  </body>
</html>