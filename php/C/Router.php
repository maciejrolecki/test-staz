<?php
require 'C/ControllerActions.php';

function routeRequest()
{
    define("DEFAULT_ACTION", "home");
    //Permet de choisir une action si aucune n'est renseignée dans le GET
    $routes = array(
        'home' => 'displayAccueil',
        'games' => 'displayAllGames',
        'search' => 'displaySearch',
        'game' => 'displayGame',
        'genre' => 'displayGenre'
    );
    $action = !empty($_GET['action']) ? $_GET['action'] : DEFAULT_ACTION;
    $function = !empty($routes[$action]) ? $routes[$action] : $routes['home'];
    try {
        if (function_exists($function)) {
            $function();
        } else {
            require "V/VueError.php";
        }
    } catch (Exception $e) {
        require "V/VueError.php";
    }
}
