<?php

require_once __DIR__ . '/config.php';

session_start();

$db = new PDO('mysql:host=localhost;dbname=mellbergs_blogg', 'root', 'root');

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

function base($str = '')
{
    return BASE_URL . $str;
}

function img($str)
{
    return base('assets/uploads/' . $str);
}

function style($str)
{
    return base('assets/style/' . $str);
}

function pagination($pages = 0, $page = 1)
{
    $pagination_links = '';
    if ($page > 1) {
        $pagination_links .= "<a href='?page=" . ($page - 1) . "'>&laquo;</a>";
    }

    for ($i = 0; $i < $pages; $i++) {
        $pagination_links .= "<a href='". base('?page=') . ($i+1) . "'>" . ($i+1) . " </a>";
    }

    if ($page < $pages) {
        $pagination_links .= "<a href='?page=" . ($page + 1) . "'>&raquo;</a>";
    }

    return $pagination_links;
}
