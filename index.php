<?php

require_once 'functions.php';

$loader = new Twig_Loader_Filesystem('views/');
$twig = new Twig_Environment($loader);

$twig->addGlobal('style', style('style.css'));
$twig->addGlobal('base', BASE_URL);
$twig->addGlobal('menu_items', $menu_items);

$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, 1) ?? 1;
$total = $db->query("SELECT * FROM posts WHERE published = 1")->rowCount();
$limit = 9;
$offset = $limit * ($page - 1);
$pages = ceil($total / $limit);

$sth = $db->prepare(
    "SELECT * FROM posts
    WHERE published = 1
    ORDER BY posts.id DESC
	LIMIT :limit
    OFFSET :offset"
);

$sth->bindValue(':limit', $limit, PDO::PARAM_INT);
$sth->bindValue(':offset', $offset, PDO::PARAM_INT);
$sth->execute();
$posts = $sth->fetchAll(PDO::FETCH_OBJ);

$pagination = pagination($pages, $page);

echo $twig->render('home.twig', [
    'posts' => $posts,
]);
