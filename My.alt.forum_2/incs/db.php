<?php 

$db = mysqli_connect('localhost', 'root', '', 'alternative_forum');

if($db) {
    $mysqlTopic = mysqli_prepare($db, "SELECT id, topic_name FROM topics");   
    mysqli_execute($mysqlTopic);
    $resTopic = mysqli_stmt_get_result($mysqlTopic);
    $topics = array_column(mysqli_fetch_all($resTopic, MYSQLI_ASSOC), 'topic_name', 'id');
}



if ($db) {
    $mysqlPosts = mysqli_prepare($db, "SELECT post_text, from_topic_id, added_at, picture, users.name FROM posts LEFT JOIN users ON posts.by_user_id = users.user_id");
    mysqli_execute($mysqlPosts);
    $resPosts = mysqli_stmt_get_result($mysqlPosts);
    $posts = mysqli_fetch_all($resPosts, MYSQLI_ASSOC);
}

if ($db) {
    $mysqlByUser = mysqli_prepare($db, "SELECT by_user_id FROM posts");
    mysqli_execute($mysqlByUser);
    $resByUser = mysqli_stmt_get_result($mysqlByUser);
    $byUser = array_column(mysqli_fetch_all($resByUser, MYSQLI_ASSOC), 'by_user_id');
}

