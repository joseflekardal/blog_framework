<?php

require_once '../functions.php';

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

require_once '../views/kategori.view.php';
