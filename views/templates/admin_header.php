<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="<?= style('style.css') ?>">
        <title>Blogg Admin</title>
    </head>
    <body>
        <div class="wrapper">
            <header>
                <h1 class="title"><a href="<?= base() ?>">Blogg</a></h1>
                <nav>
                    <a href="<?= base('cats') ?>">Categories</a>
                    <a href="<?= base('new_post') ?>">New post</a>
                    <a href="<?= base('stats') ?>">Stats</a>
                    <a href="<?= base('logout') ?>">Logout</a>
                </nav>
            </header>
            <hr>
            <?= flash() ?>
