<?php

    if(file_exists(__DIR__ . "/app/functions.php")){
        require_once __DIR__ . "/app/functions.php";
    } else {
        echo "File functions.php is not connected";
    }
    
    if(file_exists(__DIR__ . "/db/db.php")){
        require_once __DIR__ . "/db/db.php";
    } else {
        echo "File of DB is not connected \n";
    }
    $title = "Timer of Lesson";


    $sqlCount = $db->query("SELECT COUNT(*) AS qtyLes FROM lesson_time");
    $count = $sqlCount->fetch(PDO::FETCH_ASSOC);
    $curLes = $count['qtyLes'] + 1;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>

    <?php     
        if(file_exists("views/header.php")){
            require_once "views/header.php";
    } else {
        echo "Error of loading header.php \n";
    } ?>

    <div class="container">

        <div class="text-center mx-auto">
            <p class="numDay"><b>DAY <?= $curLes ?></b></p>
        </div>
        <section class="section-btn mx-auto d-flex flex-column align-items-center position-relative">
            <!-- Timer -->
            <div class="timer mx-auto d-flex flex-row w-25 justify-content-center">
                <div ><p id="hours">00</p></div>
                <div><p> <span> : </span></p></div>
                <div ><p id="minutes">00</p></div>
                <div><p> <span> : </span></p></div>
                <div ><p id="seconds">00</p></div>
            </div>
            <!-- Buttons Start and Pause -->
            <div class="btn2block mb-3 d-flex flex-row justify-content-between">
                <button id="btn-start" type="button" class="btn btn-primary btn-lg">Start</button>
                <button id="btn-pause" type="button" class="btn btn-secondary btn-lg" disabled>Pause</button>
                
            </div>
            <!-- Message -->
            <div id="alMes" class="alert alert-danger text-center position-absolute d-none" role="alert">
                <h3>You cann't stop the lesson - too little time has passed</h3>
            </div>
            <!-- Buttons Reset and Stop -->
            <div class="lesStop d-flex flex-column align-items-center">
                <button id="btn-stop" type="button" class="btn btn-danger btn-lg mb-1 w-50" disabled>STOP LESSON</button>
                <div class="buttons-block bg-body-tertiary d-flex flex-row justify-content-between rounded-3 w-50 p-3 px-3 d-none">
                    <!-- Button Reset -->
                    <button id="btn-Reset" type="button" class="btn btn-outline-danger d-flex flex-row align-items-center">
                        <svg class=" me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9"></path>
                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"></path>
                        </svg>
                        Reset
                    </button>
                    <!-- Button Finish -->
                    <button id="btn-Finish" type="button" class="btn btn-outline-danger d-flex flex-row align-items-center">
                        <svg class=" me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sign-stop" viewBox="0 0 16 16">
                            <path d="M3.16 10.08c-.931 0-1.447-.493-1.494-1.132h.653c.065.346.396.583.891.583.524 0 .83-.246.83-.62 0-.303-.203-.467-.637-.572l-.656-.164c-.61-.147-.978-.51-.978-1.078 0-.706.597-1.184 1.444-1.184.853 0 1.386.475 1.436 1.087h-.645c-.064-.32-.352-.542-.797-.542-.472 0-.77.246-.77.6 0 .261.196.437.553.522l.654.161c.673.164 1.06.487 1.06 1.11 0 .736-.574 1.228-1.544 1.228Zm3.427-3.51V10h-.665V6.57H4.753V6h3.006v.568H6.587Z"></path>
                            <path fill-rule="evenodd" d="M11.045 7.73v.544c0 1.131-.636 1.805-1.661 1.805-1.026 0-1.664-.674-1.664-1.805V7.73c0-1.136.638-1.807 1.664-1.807s1.66.674 1.66 1.807Zm-.674.547v-.553c0-.827-.422-1.234-.987-1.234-.572 0-.99.407-.99 1.234v.553c0 .83.418 1.237.99 1.237.565 0 .987-.408.987-1.237m1.15-2.276h1.535c.82 0 1.316.55 1.316 1.292 0 .747-.501 1.289-1.321 1.289h-.865V10h-.665zm1.436 2.036c.463 0 .735-.272.735-.744s-.272-.741-.735-.741h-.774v1.485z"></path>
                            <path fill-rule="evenodd" d="M4.893 0a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146A.5.5 0 0 0 11.107 0zM1 5.1 5.1 1h5.8L15 5.1v5.8L10.9 15H5.1L1 10.9z"></path>
                        </svg>
                        Finish
                    </button>
                    
                </div>
            </div>
        </section>

    </div>

    <footer class="w-100 bottom-0 bg-secondary position-absolute py-2">
        <div class="container d-flex flex-row justify-content-around fs-3 text-light">
            <a class="text-light" href="<?= __DIR__ . "index.php" ?>">Home</a>
            <a class="text-light" href="app/table.php">Table</a>
        </div>

    </footer>

    <script src="js/js.js"></script>
  </body>
</html>