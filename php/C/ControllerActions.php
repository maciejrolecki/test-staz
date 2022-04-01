<?php
require "M/Game.php";
require "M/Genre.php";

function displayAccueil()
{
    $g = new Game();
    $games = $g->getRandomGamesHighScore();
    require "V/vueAccueil.php";
}

function displayAllGames()
{
    try {
        $g = new Game();
        $games = $g->getAllGames();
        require "V/vueAllGames.php";
    } catch (PDOException $e) {
        require "V/VueError.php";
    }
}

function displaySearch()
{
    try {
        $g = new Game();
        $lookup = !empty($_GET['id']) ? $_GET['id'] : "";
        $games = $g->getSearch($lookup);
        if (!empty($_GET['type']) && $_GET['type'] === 'json') {
            header('Content-Type: application/json');
            echo json_encode($games);
        } else {
            require "V/vueSearch.php";
        }
    } catch (PDOException $e) {
        require "V/VueError.php";
    }
}

function displayGame()
{
    try {
        $g = new Game();
        if (!empty($g->getGame($_GET['id']))) {
            $game = $g->getGame($_GET['id'])[0];
            $screenshots = $g->getScreenshotsGame($_GET['id']);
            $releases = $g->getReleases($_GET['id']);
            $modes = $g->getModes($_GET['id']);
            $genres = $g->getGenres($_GET['id']);
            $alt_names = $g->getAlternativeNames($_GET['id']);
            $arts = $g->getArtwork($_GET['id']);
            $similar_games = $g->getSimilarGames($_GET['id']);
            $urls = $g->getURLs($_GET['id']);
            $videos = $g->getVideos($_GET['id']);
            require "V/vueGame.php";
        } else {
            require "V/VueError.php";
        }
    } catch (PDOException $e) {
        require "V/VueError.php";
    }
}

function displayGenre()
{

    try {
        if(true) {
            if (!empty($_GET['id'])) {
                $g = new Genre();
                $genre = $g->getGenreName($_GET['id'])[0];
                $games = $g->getGenreGames($_GET['id']);
                require "V/vueGenreGames.php";
            } else {
                $g = new Genre();
                $genres = $g->getAllGenres();
                require "V/vueGenres.php";
            }
        }else {
            require "V/VueError.php";
        }
    } catch (PDOException $e) {
        require "V/VueError.php";
    }
}




