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

    $title = "Edition Data";

    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){

        $stmt = $db->prepare(
            "SELECT date, time_start, time_end, learning_time, les_duration, les_name 
            FROM lesson_time 
            WHERE id = :id");

        $stmt->bindParam(':id', $_GET['id']);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error selection data at DB: " . $e->getMessage());
        }

        $infoLesson = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$infoLesson) {
            die('Lesson not found');
        }
    }


    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])){
        $id = $_GET['id'];
        $date = $_POST['date'];
        $time_start = $_POST['time_start'];
        $time_end = $_POST['time_end'];
        $learning_time = $_POST['learning_time'];
        $duration = $_POST['les_duration'];
        $lesName = $_POST['les_name'];
        
        $sql = "UPDATE lesson_time SET `date` = :date, time_start = :time_start, time_end = :time_end, learning_time = :learning_time, les_duration = :les_duration, les_name = :les_name WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time_start', $time_start);
        $stmt->bindParam(':time_end', $time_end);
        $stmt->bindParam(':learning_time', $learning_time);
        $stmt->bindParam(':les_duration', $duration);
        $stmt->bindParam(':les_name', $lesName);
        $stmt->bindParam(':id', $id);
        try {
            $stmt->execute();
            header("Location: ../index.php");
            exit;
        } catch (PDOException $e) {
            die("Error adding information to DB: " . $e->getMessage());
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <?php     
        if(file_exists("../views/header.php")){
            require_once "../views/header.php";
        } else {
        echo "Error of loading header.php \n";
        } ?>
    <div class="container">
        <table class="table text-center">
            <thead>
                <th>Date</th>
                <th>Start at</th>
                <th>Finish at</th>
                <th>Lesson duration</th>
                <th>Time of learning</th>
                <th>Lesson name</th>
                <th>Edit</th>
            </thead>
            <tbody class="my-auto">
                <form method="post" class=" mx-auto">
                <tr>
                    <td class="text-center"><div class="form-floating">
                        <input name="date" type="text" class="form-control text-center" autocomplete="off" value="<?= $infoLesson['date'] ?>">
                    </div></td>
                    <td><div class="form-floating">
                        <input name="time_start" type="text" class="form-control text-center" autocomplete="off" value="<?= $infoLesson['time_start'] ?>">
                    </div></td>
                    <td><div class="form-floating">
                        <input name="time_end" type="text" class="form-control text-center" autocomplete="off" value="<?= $infoLesson['time_end'] ?>">
                    </div></td>
                    <td><div class="form-floating">
                        <input name="learning_time" type="text" class="form-control text-center" autocomplete="off" value="<?= $infoLesson['learning_time'] ?>">
                    </div></td>
                    <td><div class="form-floating">
                        <input name="les_duration" type="text" class="form-control text-center" autocomplete="off" value="<?= $infoLesson['les_duration'] ?>">
                    </div></td>
                    <td><div class="form-floating">
                        <input name="les_name" type="text" class="form-control text-center" autocomplete="off" value="<?= $infoLesson['les_name'] ?>">
                    </div></td>
                    <td><button type="submit" class="btn btn-primary fs-3 my-auto">Send</button></td>
                </tr>
                </form>
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