<?php

require_once '../functions.php';

$loader = new Twig_Loader_Filesystem('../views/');
$twig = new Twig_Environment($loader);

$twig->addGlobal('base', BASE_URL);

if (!isset($_SESSION['id'])) {
    $_SESSION['error'] = "Please login";
    header('Location: login');
    die;
}

$sth = $db->prepare(
    "SELECT users.*,
    CONCAT(users.first_name, ' ', users.last_name) AS full_name
    FROM users
    WHERE id = :id
    LIMIT 1"
);
$sth->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
$sth->execute();
$user = $sth->fetch(PDO::FETCH_OBJ);

// Get posts by user.id
$sth = $db->prepare("SELECT id, title FROM posts WHERE user_id = :id");
$sth->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
$sth->execute();
$user->posts = $sth->fetchAll(PDO::FETCH_OBJ);

echo $twig->render('admin.twig', [
    'user' => $user,

]);
