<?php

require_once '../functions.php';

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

require_once '../views/admin.view.php';
