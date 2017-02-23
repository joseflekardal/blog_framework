<?php

require_once '../functions.php';
require_once '../models/User.php';
use Lekardal\Post;



$loader = new Twig_Loader_Filesystem('../views/');
$twig = new Twig_Environment($loader);

$twig->addGlobal('base', BASE_URL);
$twig->addGlobal('menu_items', $menu_items);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, 1);

$post = Post::with('author')->find($id);

$twig->display('post.twig', ['post' => $post]);
