<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/database.php';

$dsn = 'mysql:host=' . HOST . ';dbname=' . DB_NAME;

$db = new PDO($dsn, DB_USER, DB_PASS);

$menu_items = $db->query('SELECT * FROM categories')->fetchAll(PDO::FETCH_OBJ);

function flash()
{
    $flash = '';
    if (isset($_SESSION['success'])) {
        $flash .= '<p class="success">' . $_SESSION['success'] . '</p>';
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['error'])) {
        $flash .= '<p class="error">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    }

    return $flash;
}

function dd($var)
{
    echo "<pre>";
    die(var_dump($var));
}

function pagination($pages = 0, $page = 1)
{
    $pagination_links = '';
    if ($page > 1) {
        $pagination_links .= "<a href='?page=" . ($page - 1) . "'>&laquo;</a>";
    }

    for ($i = 0; $i < $pages; $i++) {
        $pagination_links .= "<a href='" . BASE_URL . "?page=" . ($i+1) . "'>" . ($i+1) . " </a>";
    }

    if ($page < $pages) {
        $pagination_links .= "<a href='?page=" . ($page + 1) . "'>&raquo;</a>";
    }

    return $pagination_links;
}
