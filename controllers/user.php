<?php

require_once '../functions.php';
require_once '../models/User.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Get user
$user = new User;
$user = $user->find($_GET['id']);

// Get posts by user.id
$sth = $db->prepare("SELECT id, title FROM posts WHERE user_id = :id");
$sth->execute([':id' => $id]);
$user->posts = $sth->fetchAll(PDO::FETCH_OBJ);

require_once '../views/user.view.php';
