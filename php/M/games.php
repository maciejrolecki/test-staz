<?php
try {
    require "Game.php";
    $g = new Game();
    $games = $g->getAllGames();
    //var_dump($games);
    require "V/vueAllGames.php";
} catch (PDOException $e) {
    require "V/VueError.php";
}