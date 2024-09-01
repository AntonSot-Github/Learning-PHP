

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random question PHP</title>
</head>
<body>
    <?php 
    $t = count($questions);
    $c = rand(0, $t);
    function randQuest(){
        global $questions;
        echo $questions[0];
    }
    randQuest();
    ?>
</body>
</html>