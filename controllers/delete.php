<?php

require_once '../functions.php';

if (isset($_GET['id'])) {
    $sth = $db->prepare("SELECT * FROM posts WHERE id = :id");
    $sth->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $sth->execute();
    $post = $sth->fetch(PDO::FETCH_OBJ);

    if ($post->user_id !== $_SESSION['id']) {
        $_SESSION['error'] = "You can't delete a post you didn't write";
        header('Location: ' . base('admin'));
        die;
    }

}

header('Location: ' . base('admin'));
die;
