<?php
    
    var_dump($_POST);
    
    if(file_exists("db.php")){
        require_once("db.php");
    } else {
        echo "Error: file of DB is not connected";
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        
    // Привязка данных
        mysqli_stmt_bind_param($stmt, 'ss', $name, $email);

        $addValDB = mysqli_stmt_execute($stmt);
        if(!$addValDB){
            echo "Error: info is noot added" . mysqli_stmt_errno($stmt);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: insert.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson 3 Course DB by Hemmy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar bg-body-tertiary mb-5">
        <div class="container-fluid">
            <div class="w-100">
                <h1 class="h1 text-center">Lesson 3 Course DB by Hemmy</h1>
            </div>
        </div>
    </nav>
    <!-- Form -->
    <div class="w-25 mx-auto">
        <form method="post">
            <div class="mb-3">
                <label for="Name" class="form-label fs-3">Name</label>
                <input name="name" type="name" class="form-control" id="Name">
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label fs-3">Email address</label>
                <input name="email" type="email" class="form-control" id="Email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text fs-5">We'll never share your email with anyone else.</div>
            </div>

            <button type="submit" class="btn btn-primary fs-4">Send</button>

        </form>
    </div>

    
</body>
</html>