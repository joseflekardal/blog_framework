<?php require_once 'templates/header.php' ?>

<h2>Senaste inläggen</h2>

<div class="posts">
    <?php if (count($posts) > 1) : ?>
        <?php foreach ($posts as $post) : ?>

        <div class="post">
            <a href="<?= base('post/' . $post->id) ?>">
                <h3><?= $post->title ?></h3>
                <div class="img" style="background-image: url(<?= img($post->featured_img) ?>)"></div>
            </a>
        </div>

        <?php endforeach ?>
    <?php else : ?>
        <h3>Sorry, no posts found</h3>
    <?php endif ?>
</div>

<div class="pagination">
    <?= $pagination ?>
</div>

<?php require 'templates/footer.php' ?>
