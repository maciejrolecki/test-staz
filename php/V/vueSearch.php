<?php $title = "Search"; ?>
<?php ob_start(); ?>
    <div id="search-container"><form id="recherche" action="<?=homeURL('search') ?>"><input type="text" id="search" name="term"><button id="search">Search</button></form></div>
    <br>
    <div class="container">
    <div class="listGames">
<?php if (!empty($games)) :?>
    <?php foreach ($games as $game) : ?>
            <article>
                <a href=<?=homeURL("game/".$game['id']) ?>>
                    <div class="searched_game">
                        <img class="image_cover_pres" src="<?php echo $game['cover'] ?>" width="150" height="200" alt="<?php echo $game['title'] ?> cover">
                        <div>
                            <h3 class="search"><?php echo $game['title'] ?></h3>
                            </div>
                        </div>
                    </a>
                </article>
    <?php endforeach?>
<?php endif; ?>
    </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require "template.php"; ?>