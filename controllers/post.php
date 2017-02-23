<?php

require_once '../functions.php';

$loader = new Twig_Loader_Filesystem('../views/');
$twig = new Twig_Environment($loader);

$twig->addGlobal('style', style('style.css'));
$twig->addGlobal('base', BASE_URL);
$twig->addGlobal('menu_items', $menu_items);

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

echo $twig->render('post.twig', ['post' => $post]);
