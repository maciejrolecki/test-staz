<?php $title = "Genres"; ?>
<?php ob_start(); ?>
    <div id="main" class="container">
<?php if (!empty($genres)) : ?>
    <?php foreach ($genres as $genre) : ?>
    <div>
        <a href="<?= homeURL("genre/" . $genre['id']) ?>">
            <h1><?= $genre['name'] ?></h1>
        </a>
    </div>
    <?php endforeach ?>
<?php endif; ?>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require "template.php"; ?>