<?php

require_once '../functions.php';
require_once '../models/User.php';
use Lekardal\User;

$loader = new Twig_Loader_Filesystem('../views/');
$twig = new Twig_Environment($loader);

$twig->addGlobal('base', BASE_URL);
$twig->addGlobal('menu_items', $menu_items);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$user = User::with('posts')->find($id);

$twig->display('user.twig', [
    'user' => $user,
    'posts' => $user->posts,
]);