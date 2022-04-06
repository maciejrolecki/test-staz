<?php $title = "All Products"; ?>
<?php ob_start(); ?>
<div class="container">
<a href="addProduct"><button class="button">Add Product</button></a>
    <?php if (!empty($products)) : ?>
        <?php foreach ($products as $product) : ?>
            <a href="product/<?= $product['id'] ?>">
                <div class="game_infos">
                    <img class="image_cover_pres" src="<?= $product['image'] ?>" width="150" height="200" alt="<?php echo $product['name'] ?> cover">
                    <div>
                        <h1 class="titleGamePage"><?= $product['name'] ?></h1>
                        <?php if (!empty($product['description'])) : ?>
                            <h2>Description</h2>
                            <p><?= $product['description'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </a>
            <br>
        <?php endforeach ?>
    <?php endif; ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require "template.php"; ?>