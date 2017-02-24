<?php

require_once '../functions.php';

use App\Post;

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, 1);
$post = Post::with('author')->find($id);

$twig->display('post.twig', ['post' => $post]);