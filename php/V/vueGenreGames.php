<?php $title = "Genre games"; ?>
<?php ob_start(); ?>
    <br>

    <div class="container">
        <h1><?= $genre['name'] ?></h1>
        <?php if (!empty($games)) : ?>
            <?php $v = 0; ?>
            <?php foreach ($games as $game) : ?>
                <?php if ($v === 0) : ?>
                    <div class="game_infos_precise">
                <?php endif; ?>
                <article>

                    <a href="<?= homeURL("game/" . $game['gid']) ?>">
                        <div class="game_infos">
                            <img class="image_screen_pres" src="<?php echo $game['gu'] ?>"
                                 alt="<?php echo $game['gn'] ?> cover">
                        </div>
                        <div>
                            <h3 class="search"><?= $game['gn'] ?></h3>
                        </div>

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