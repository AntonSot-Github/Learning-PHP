<?php 

$db = mysqli_connect('localhost', 'root', '', 'alternative_forum');

if($db) {
    $mysqlTopic = mysqli_prepare($db, "SELECT id, topic_name FROM topics");   
    mysqli_execute($mysqlTopic);
    $resTopic = mysqli_stmt_get_result($mysqlTopic);
    $topics = array_column(mysqli_fetch_all($resTopic, MYSQLI_ASSOC), 'topic_name', 'id');
}

/* if ($db) {
    $mysqlPosts = mysqli_prepare($db, "SELECT by_user_id, from_topic_id, post_text, added_at, picture FROM posts");
    mysqli_execute($mysqlPosts);
    $resPosts = mysqli_stmt_get_result($mysqlPosts);
    $posts = array_map(function($row){
        return [
            'by_user_id' => $row['by_user_id'],
            'from_topic_id' => $row['from_topic_id'],
            'post_text' => $row['post_text'],
            'added_at' => $row['added_at'],
            'picture' => $row['picture'],
        ];
    }, mysqli_fetch_all($resPosts, MYSQLI_ASSOC));
} */

if ($db) {
    $mysqlPosts = mysqli_prepare($db, "SELECT post_text FROM posts WHERE from_topic_id = 100");
    mysqli_execute($mysqlPosts);
    $resPosts = mysqli_stmt_get_result($mysqlPosts);
    $posts = array_column(mysqli_fetch_all($resPosts, MYSQLI_ASSOC), 'post_text');
}

if ($db) {
    $mysqlByUser = mysqli_prepare($db, "SELECT by_user_id FROM posts");
    mysqli_execute($mysqlByUser);
    $resByUser = mysqli_stmt_get_result($mysqlByUser);
    $byUser = array_column(mysqli_fetch_all($resByUser, MYSQLI_ASSOC), 'by_user_id');
}