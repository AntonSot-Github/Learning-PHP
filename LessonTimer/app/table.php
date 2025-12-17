<?php

    if(file_exists(__DIR__ . "/functions.php")){
        require_once __DIR__ . "/functions.php";
    } else {
        echo "File functions.php is not connected";
    }

    if(file_exists(__DIR__ . "/../db/db.php")){
        require_once __DIR__ . "/../db/db.php";
    } else {
        echo "error";
    }

    $title = "Lessons Table";

    $select = $db->query("SELECT * FROM lesson_time");
    $table = $select->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php     
        if(file_exists("../views/header.php")){
            require_once "../views/header.php";
        } else {
        echo "Error of loading header.php \n";
    } ?>
    <div class="container">
        <table class="table table-striped text-center">
            <thead>
                <th>№</th>
                <th>Date</th>
                <th>Start at</th>
                <th>Finish at</th>
                <th>Lesson duration</th>
                <th>Time of learning</th>
                <th>Lesson name</th>
                <th>Edition data</th>
            </thead>
            <tbody>                
                    <?php foreach($table as $lesson):?>
                        <tr>
                            <th><?= $lesson['id'] ?></th>
                            <td><?= $lesson['date'] ?></td>
                            <td><?= $lesson['time_start'] ?></td>
                            <td><?= $lesson['time_end'] ?></td>
                            <td><?= $lesson['learning_time'] ?> min</td>
                            <td><?= $lesson['les_duration'] ?> min</td>
                            <td><?= $lesson['les_name'] ?> </td>
                            <td ><a class="text-center" href="edit.php?id=<?= $lesson['id'] ?>">Edit</a></td>
                        </tr>

                    <?php endforeach; ?>
                
            </tbody>
        </table>

    </div>
    <?php     
        if(file_exists("../views/footer.php")){
            require_once "../views/footer.php";
        } else {
        echo "Error of loading footer.php \n";
    } ?>
    <script src="../js/js.js"></script>
</body>
</html>