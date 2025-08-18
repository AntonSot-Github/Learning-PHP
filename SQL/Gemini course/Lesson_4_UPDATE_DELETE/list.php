<?php

/* Header of document */
    $title = "Lesson 4 DELETE UPDATE";

/* Connection DB */
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "hemmy_app";
    // Creating connection
    $conn = mysqli_connect($servername, $username, $password, $db);
    // Checking the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

/* SELECTing in DB */
    $sql = "SELECT id, name, email FROM users ORDER BY id";
    $res = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
   <!-- Navbar -->
    <nav class="navbar bg-body-tertiary mb-5">
        <div class="container-fluid">
            <div class="w-100">
                <h1 class="h1 text-center"><?php echo $title ?></h1>
            </div>
        </div>
    </nav>
    <!-- Table -->
    <main>
        <div class="w-25 mx-auto">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">First</th>
                        <th class="text-center" scope="col">Email</th>
                        <th class="text-end" scope="col">Delete user</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($res) > 0){
                        $i = 1;
                        while($row = mysqli_fetch_assoc($res)){
                            echo "<tr>
                                    <th class='text-center' scope='row'>$i</th>
                                    <td class='text-center'>{$row['name']}</td>
                                    <td class='text-center'>{$row['email']}</td>
                                    <td class='text-end'><button name='delete' type='button' class='btn btn-danger'>Delete</button></td>
                                </tr>";
                                $i++;
                            }
                        } ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php
        // Закрываем результат и соединение
        mysqli_free_result($res);
        mysqli_close($conn);
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
</body>
</html>