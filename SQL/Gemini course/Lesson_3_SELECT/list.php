<?php
/* Header of document */
    $title = "Lesson 3 SELECT";

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

/* Working with DB */
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
                        <th class="text-start" scope="col">#</th>
                        <th class="text-center" scope="col">First</th>
                        <th class="text-end" scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($res) > 0){
                        while($row = mysqli_fetch_assoc($res)){
                            echo "<tr>
                                    <th scope='row'>{$row['id']}</th>
                                    <td class='text-center'>{$row['name']}</td>
                                    <td class='text-end'>{$row['email']}</td>
                                </tr>";
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
</body>
</html>