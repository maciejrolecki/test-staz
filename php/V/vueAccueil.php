<?php $title = "Accueil"; ?>
<?php ob_start(); ?>
    <div id="main" class="">
        <div class="container">
            <div class="slider-game">
                <?php if (!empty($games)): ?>
                    <?php foreach ($games as $game) : ?>
                        <a href="game/<?= $game['id'] ?>">
                            <article>
                                <img class="image_cover_pres"
                                     src="<?php echo $game['cover'] ?>" alt="<?php echo $game['title'] ?> cover">
                                <h3 class="slide-title-container"><?= $game['title'] ?></h3>
                            </article>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require "template.php"; ?>