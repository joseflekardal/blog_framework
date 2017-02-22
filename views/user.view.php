<?php require_once 'templates/header.php' ?>

<h2><?= $user->first_name ?> profile</h2>
<a href="mailto:<?= $user->email ?>">
    <img src="<?= img($user->avatar) ?>" width="200">
</a>
<p class="description">"<?= $user->description ?>"</p>
<hr>
<h3>My posts</h3>
<?php foreach($user->posts as $post) : ?>
<a href="<?= base('post/' . $post->id) ?>">
    <h2><?= $post->title ?></h2>
</a>
<?php endforeach ?>

<?php require_once 'templates/footer.php' ?>
