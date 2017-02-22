<?php require_once 'templates/admin_header.php' ?>

<h2><?= $user->full_name ?></h2>
<?php foreach($user->posts as $post) : ?>
<p><?= $post->title ?> <a href="delete/<?= $post->id ?>">delete</a></p>
<?php endforeach ?>

<?php require_once 'templates/footer.php' ?>
