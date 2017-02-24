<?php

require_once '../functions.php';

use App\Post;

$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, 1) ?? 1;
$total = Post::where('published', "1")->count();
$limit = 9;
$offset = $limit * ($page - 1);
$pages = ceil($total / $limit);

$posts = Post::where('published', '1')
    ->offset($offset)
    ->limit($limit)
    ->get();

$twig->display('home.twig', [
    'posts' => $posts,
    'pagination' => pagination($pages, $page),
]);
