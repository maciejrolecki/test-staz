<?php
$title = "Game"; ?>
<?php ob_start(); ?>
<?php if (!empty($game)): ?>
<div id="main" class="container">
    <h1 class="titleGamePage"><?= $game['title'] ?></h1>
    <div class="game_infos">
        <img data-lity src="<?= $game['cover'] ?>" width=250" height="375" alt="<?= $game['title'] ?> cover">
        <div>
            <?php if (!empty($game['summary'])): ?>
                <h2>Description</h2>
                <p><?= $game['summary'] ?></p>
            <?php endif; ?>
        </div>
    </div>
    <br>
    <div>
        <div class="game_infos_precise">
            <div>
                <?php if (!empty($releases)): ?>
                    <div>
                        <h3>Releases dates </h3>

                        <?php foreach ($releases as $release): ?>
                            <p><?= $release['PLATFORM_NAME'] . ' on ' . $release['RELEASE_DATE'] . ' : ' . $release['RELEASE_REGION'] ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($alt_names)): ?>
                    <div>
                        <h3>Alternative names</h3>
                        <?php foreach ($alt_names as $alt_name): ?>
                            <p><?= $alt_name['name'] ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="game_infos_precise">
                <div>
                    <?php if (!empty($modes)): ?>
                        <div>
                            <h3>Game modes</h3>
                            <?php foreach ($modes as $mode): ?>
                                <p><?= $mode['MODE_NAME'] ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($genres)): ?>
                        <div>
                            <h3>Game genre</h3>
                            <?php foreach ($genres as $genre): ?>
                            <a class="url" href="<?php echo homeURL("genre/".$genre['id']) ?>">
                                <p><?= $genre['name'] ?></p>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="game_infos_precise">
                    <?php if (!empty($urls)): ?>
                        <div>
                            <h3>Useful URLs</h3>
                            <?php foreach ($urls as $url): ?>
                                <a class="url" href="<?php echo $url['website_url'] ?>">
                                    <p class="url">
                                        <?= strtoupper($url['website_cat']) ?>
                                    </p>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>


        <div>
            <?php if (!empty($screenshots)): ?>
                <h2 class="presentation_cat">Screenshots</h2>
                <div class="container">
                    <div class="slider-game">
                        <?php foreach ($screenshots as $screen) : ?>
                            <div class="slide-game-item">
                                <article>
                                    <img data-lity class="image_screen_pres" src="<?= $screen['screenshot'] ?>"
                                         alt="<?= $game['title'] ?> screenshot">
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php if (!empty($arts)): ?>
            <h2 class="presentation_cat">Artwork</h2>
            <div class="container">
                <div class="slider-game">
                    <?php foreach ($arts as $artwork) : ?>
                        <div class="slide-game-item">
                            <article>
                                <img data-lity class="image_screen_pres" src="<?php echo $artwork['ARTWORK_URL'] ?>"
                                     alt="<?= $game['title'] ?> artwork">
                            </article>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        <?php endif; ?>
        <?php if (!empty($similar_games)): ?>
            <h2 class="presentation_cat">Similar Games</h2>
            <div class="container">
                <div class="slider-game">
                    <?php foreach ($similar_games as $sim_game) : ?>
                    <a href="<?= homeURL("game/". $sim_game['id']) ?>">
                        <article>
                            <img class="image_cover_pres"
                                 src="<?php echo $sim_game['cover'] ?>" alt="<?php echo $sim_game['title'] ?>">
                            <h3 class="slide-title-container"><?php echo $sim_game['title'] ?></h3>
                        </article>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if (!empty($videos)): ?>
            <h2 class="presentation_cat">Game related videos</h2>
            <p>Click to play</p>
            <div class="container">
                <div class="slider-game">
                    <?php foreach ($videos as $vid) : ?>
                        <div class="slide-game-item">
                            <article>
                                <a data-lity href="https://www.youtube.com/embed/<?php echo $vid['vid_url'] ?>">
                                    <img class="image_screen_pres"
                                         src="https://img.youtube.com/vi/<?php echo $vid['vid_url'] ?>/maxresdefault.jpg"
                                         alt="Video for <?php echo $game['title'] ?>">
                                </a>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php else: ?>
        <h1>NON EXISTANT GAME</h1>
    <?php endif; ?>
    <?php $content = ob_get_clean(); ?>
    <?php require "template.php"; ?>
