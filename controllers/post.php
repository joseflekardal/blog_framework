<?php

require_once '../functions.php';

$sth = $db->prepare(
    "SELECT posts.*,
    CONCAT(users.first_name, ' ', users.last_name) AS author
    FROM posts
    LEFT JOIN users ON posts.user_id = users.id
    WHERE posts.id = :id LIMIT 1
");

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, 1);

$sth->execute([':id' => $id]);
$post = $sth->fetch(PDO::FETCH_OBJ);
$date = strftime("%e %b %Y", strtotime($post->created_at));

require_once '../views/post.view.php';
