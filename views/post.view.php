<?php require_once 'templates/header.php' ?>

<h2><?= $post->title ?></h2>
<div class="img" style="background-image: url(<?= img($post->featured_img) ?>)"></div>
<p><?= $post->content ?></p>
<p><small>
    Written by <a href="<?= base('user/' . $post->user_id) ?>"><?= $post->author ?></a>
    On <?= $date ?>
</small></p>

<?php require_once 'templates/footer.php' ?>
