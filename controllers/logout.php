<?php

require_once '../functions.php';

if (isset($_SESSION['id'])) {
    $_SESSION['id'] = null;
    unset($_SESSION['id']);
}

header('Location: login');
die;
