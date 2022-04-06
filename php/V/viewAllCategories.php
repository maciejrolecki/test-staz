<?php $title = "Categories"; ?>
<?php ob_start(); ?>
    <div id="main" class="container">
    <a href="viewAddCategory"><button class="button">Add Category</button></a>

<?php if (!empty($categories)) : ?>
    <?php foreach ($categories as $category) : ?>
    <div>
        <a href="<?= homeURL("category/" . $category['id']) ?>">
            <h1><?= $category['name'] ?></h1>
        </a>
    </div>
    <?php endforeach ?>
<?php endif; ?>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require "template.php"; ?>