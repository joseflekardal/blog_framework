<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/database.php';

use App\Category;

$loader = new Twig_Loader_Filesystem('../views/');
$twig = new Twig_Environment($loader, [
    'debug' => true
]);

$twig->addExtension(new Twig_Extension_Debug());

$twig->addGlobal('base', BASE_URL);
$twig->addGlobal('menu_items', Category::all());

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
    $base = BASE_URL;
    $next = $page + 1;
    $prev = $page - 1;

    $pagination_links .= $page > 1 ? "<a href='$base?page=$prev'>&laquo;</a>" : null;

    for ($i = 1; $i <= $pages; $i++) {

        $current_page = $page === $i;

        $pagination_links .= "<a href='$base?page=$i'";
        $pagination_links .= $current_page ? ' class="active_page"' : null;
        $pagination_links .= ">$i</a>";
    }

    $pagination_links .= $page < $pages ? "<a href='$base?page=$next'>&raquo;</a>" : null;

    return $pagination_links;
}
