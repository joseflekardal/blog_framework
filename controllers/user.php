<?php

require_once '../functions.php';

use App\User;

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$user = User::with('posts')->find($id);

$twig->display('user.twig', ['user' => $user]);