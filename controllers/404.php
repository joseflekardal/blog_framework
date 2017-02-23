<?php

require_once '../functions.php';

$loader = new Twig_Loader_Filesystem('../views/');
$twig = new Twig_Environment($loader);

$twig->addGlobal('base', BASE_URL);

$twig->display('404.twig');