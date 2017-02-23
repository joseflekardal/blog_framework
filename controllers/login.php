<?php

require_once '../functions.php';

$loader = new Twig_Loader_Filesystem('../views/');
$twig = new Twig_Environment($loader);

if (isset($_POST['username']) && !empty(trim($_POST['username']))) {

    $sth = $db->prepare("SELECT * FROM users WHERE username = :username");
    $sth->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
    $sth->execute();

    if ($user = $sth->fetch(PDO::FETCH_OBJ)) {
        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['success'] = "Logged in";
            $_SESSION['id'] = $user->id;
            header('Location: admin');
            die;
        }
    }

    $_SESSION['error'] = "Wrong username/password";
    header('Location: login');

}

echo $twig->render('login.twig', [
    'flash' => flash(),
]);
