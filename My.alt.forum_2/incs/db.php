<?php 

$db = mysqli_connect('localhost', 'root', '', 'alternative_forum');

if($db) {
    $mysqlTopic = mysqli_prepare($db, "SELECT id, topic_name FROM topics");   
    mysqli_execute($mysqlTopic);
    $resTopic = mysqli_stmt_get_result($mysqlTopic);
    $topics = array_column(mysqli_fetch_all($resTopic, MYSQLI_ASSOC), 'topic_name', 'id');
}

