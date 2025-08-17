<?php
/* Connection DB */
    if(file_exists("db_pdo.php")){
        require_once("db_pdo.php");
    }

/* Header of document */
    $title = "Lesson 3 SELECT";

/* Working with DB */
    $sql = "SELECT id, name, email FROM users ORDER BY id";
    $res = $db->query($sql);
    $users = $res->fetchAll(PDO::FETCH_ASSOC);
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
                    <?php foreach($users as $user):?>
                        <tr>
                            <th scope='row'><?=$user['id'] ?></th>
                            <td class='text-center'><?=$user['name'] ?></td>
                            <td class='text-end'><?=$user['email'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>