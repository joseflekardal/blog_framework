<?php

require_once '../functions.php';

$loader = new Twig_Loader_Filesystem('../views/');
$twig = new Twig_Environment($loader);

$twig->addGlobal('style', style('style.css'));
$twig->addGlobal('base', BASE_URL);
$twig->addGlobal('menu_items', $menu_items);

$sth = $db->prepare("SELECT * FROM categories WHERE slug = :slug");
$sth->bindParam(':slug', $_GET['slug'], PDO::PARAM_STR);
$sth->execute();
$cat = $sth->fetch(PDO::FETCH_OBJ);

$posts = $db->query(
    "SELECT * FROM posts
    WHERE cat_id = " . $cat->id . "
    AND published = 1
    ORDER BY id DESC"
)->fetchAll(PDO::FETCH_OBJ);

echo $twig->render('kategori.twig', [
    'posts' => $posts,
    'cat' => $cat
]);
