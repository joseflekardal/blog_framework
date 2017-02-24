<?php

require_once '../functions.php';

use App\Category;

$cat = Category::where('slug', $_GET['slug'])->with('posts')->first();

$twig->display('kategori.twig', ['cat' => $cat]);
