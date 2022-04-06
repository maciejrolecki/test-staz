<?php
require 'C/ControllerActions.php';

function routeRequest()
{
    define("DEFAULT_ACTION", "home");
    //Permet de choisir une action si aucune n'est renseignée dans le GET
    $routes = array(
        'home' => 'displayHome',
        'products' => 'displayAllProducts',
        'search' => 'displaySearch',
        'product' => 'displayProduct',
        'category' => 'displayCategory',
        'categories' => 'displayCategory',
        'viewAddCategory' => 'viewAddCategory',
        'viewAddProduct' => 'viewAddProduct',
        'addCategory' => 'addCategory',
        'addProduct' => 'addProduct'

    );
    $action = !empty($_GET['action']) ? $_GET['action'] : DEFAULT_ACTION;
    $function = !empty($routes[$action]) ? $routes[$action] : $routes['home'];
    try {
        if (function_exists($function)) {
            $function();
        } else {
            require "V/viewError.php";
        }
    } catch (Exception $e) {
        require "V/viewError.php";
    }
}
