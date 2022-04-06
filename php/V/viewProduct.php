<?php
$title = "Product"; ?>
<?php ob_start(); ?>
<?php if (!empty($product)) : ?>
    <div id="main" class="container">
        <h1 class="titleGamePage"><?= $product['name'] ?></h1>
        <div class="game_infos">
            <img data-lity src="<?= $product['image'] ?>" width=300" height="375" alt="<?= $product['name'] ?> cover">
            <div>
                <?php if (!empty($product)) : ?>
                    <h2>Description</h2>
                    <p><?= $product['description'] ?></p>
                    <h2>Status</h2>
                    <p><?= $product['status'] ?></p>
                    <?php if (!empty($categories[0])) : ?>
                        <h2>Categories it belongs to:</h2>
                        <?php foreach ($categories as $category) : ?>
                            <p><a href="<?= homeURL("category/" . $category['id']) ?>"><?= $category['name'] ?></a></p>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php else : ?>
    <h1>NON EXISTANT PRODUCT</h1>
<?php endif; ?>
<?php $content = ob_get_clean(); ?>
<?php require "template.php"; ?>