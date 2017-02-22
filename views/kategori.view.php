<?php require_once 'templates/header.php' ?>

<h2><?= $cat->name ?></h2>
<div class="posts">
    <?php foreach($posts as $post) : ?>
    <div class="post">
        <a href="<?= base('post/' . $post->id) ?>">
            <h3><?= $post->title ?></h3>
            <div class="img" style="background-image: url(<?= img($post->featured_img) ?>)"></div>
        </a>
    </div>
    <?php endforeach ?>
</div>
<?php require_once 'templates/footer.php' ?>
