<?php $title = "All Games"; ?>
<?php ob_start(); ?>
    <div class="container">
        <?php if (!empty($games)): ?>
            <?php foreach ($games as $game) : ?>
                <a href="game/<?= $game['id'] ?>">
                    <div class="game_infos">
                        <img class="image_cover_pres" src="<?= $game['cover'] ?>" width="150" height="200"
                             alt="<?php echo $game['title'] ?> cover">
                        <div>
                            <h1 class="titleGamePage"><?= $game['title'] ?></h1>
                            <?php if (!empty($game['summary'])): ?>
                                <h2>Description</h2>
                                <p><?= $game['summary'] ?></p>
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