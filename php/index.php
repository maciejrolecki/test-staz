<?php
function pre($a){
    echo '<pre content="background-color: black; padding: 10px;font-size: 14px;color: white;">';
    print_r($a);
    echo '</pre>';
}
function homeURL($a=""){
    return '/php/'.$a;
}
require "C/Router.php";
routeRequest();
