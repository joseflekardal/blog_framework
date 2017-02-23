<?php

require_once '../functions.php';

$loader = new Twig_Loader_Filesystem('../views/');
$twig = new Twig_Environment($loader);

$twig->addGlobal('style', style('style.css'));
$twig->addGlobal('base', BASE_URL);
$twig->addGlobal('menu_items', $menu_items);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sth = $db->prepare("SELECT * FROM users WHERE id = :id");

$sth->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$sth->execute();

$user = $sth->fetch(PDO::FETCH_OBJ);

// Get posts by user.id
$sth = $db->prepare("SELECT id, title FROM posts WHERE user_id = :id");
$sth->execute([':id' => $id]);
$user->posts = $sth->fetchAll(PDO::FETCH_OBJ);

echo $twig->render('user.twig', [
    'user' => $user,
    'posts' => $user->posts,
]);
