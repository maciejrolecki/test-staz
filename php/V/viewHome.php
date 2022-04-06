<?php $title = "Home screen"; ?>
<?php ob_start(); ?>
    <div id="main" class="">
        <div class="container">
            <div class="slider-game">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product) : ?>
                        <a href="product/<?= $product['id'] ?>">
                            <article>
                                <img class="image_cover_pres"
                                     src="<?php echo $product['image'] ?>" alt="<?php echo $product['name'] ?> image">
                                <h3 class="slide-title-container"><?= $product['name'] ?></h3>
                            </article>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require "template.php"; ?>