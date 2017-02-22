<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="<?= style('style.css') ?>">
        <title>Blogg</title>
    </head>
    <body>
        <div class="wrapper">
            <header>
                <h1 class="title"><a href="<?= base() ?>">Blogg</a></h1>
                <nav>
                    <?php foreach ($menu_items as $item) : ?>
                    <a href="<?= base('kategori/' . $item->slug) ?>">
                        <?= $item->name ?>
                    </a>
                    <?php endforeach ?>
                </nav>
            </header>
            <hr>
