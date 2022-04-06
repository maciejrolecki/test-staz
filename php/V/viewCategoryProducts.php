<?php $title = "Category products"; ?>
<?php ob_start(); ?>
    <br>

    <div class="container">
        <h1><?= $category['name'] ?></h1>
        <?php if (!empty($products)) : ?>
            <?php $v = 0; ?>
            <?php foreach ($products as $product) : ?>
                <?php if ($v === 0) : ?>
                    <div class="game_infos_precise">
                <?php endif; ?>
                <article>
                    <a href="<?= homeURL("product/" . $product['id']) ?>">
                            <article>
                                <img class="image_screen_pres"
                                     src="<?php echo $product['image'] ?>" alt="<?php echo $product['name'] ?> image">
                                <h3 class="slide-title-container"><?= $product['name'] ?></h3>
                            </article>
                        </a>
                </article>
                <?php $v++; ?>
                <?php if ($v === 2) : ?>
                    </div>
                    <?php $v=0; ?>
                <?php endif; ?>

            <?php endforeach ?>
        <?php endif; ?>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require "template.php"; ?>