<?php
require "M/Product.php";
require "M/Category.php";

function displayHome()
{
    $p = new Product();
    $products = $p->getAllProductsRandom();
    require "V/viewHome.php";
}

function displayAllProducts()
{
    try {
        $p = new Product();
        $products = $p->getAllProducts();
        require "V/viewAllProducts.php";
    } catch (PDOException $e) {
        require "V/viewError.php";
    }
}

function displaySearch()
{
    try {
        $p = new Product();
        $lookup = !empty($_GET['id']) ? $_GET['id'] : "";
        $products = $p->getSearch($lookup);
        if (!empty($_GET['type']) && $_GET['type'] === 'json') {
            header('Content-Type: application/json');
            echo json_encode($products);
        } else {
            require "V/viewSearch.php";
        }
    } catch (PDOException $e) {
        require "V/viewError.php";
    }
}

function displayProduct()
{
    try {
        $p = new Product();
        if (!empty($p->getProduct($_GET['id']))) {
            $product = $p->getProduct($_GET['id'])[0];
            $image = $p->getImageProduct($_GET['id'])[0];
            $status = $p->getStatus($_GET['id'])[0];
            $categories = $p->getCategories($_GET['id']);
            require "V/viewProduct.php";
        } else {
            require "V/viewError.php";
        }
    } catch (PDOException $e) {
        require "V/viewError.php";
    }
}

function displayCategory()
{
    try {
        if (!empty($_GET['id'])) {
            $c = new Category();
            $category = $c->getCategoryName($_GET['id'])[0];
            $products = $c->getCategoryProducts($_GET['id']);
            require "V/viewCategoryProducts.php";
        } else {
            $c = new Category();
            $categories = $c->getAllCategories();
            require "V/viewAllCategories.php";
        }
    } catch (PDOException $e) {
        require "V/viewError.php";
    }
}

function viewAddCategory()
{
    try {
        require "V/viewAddCategory.php";
    } catch (Exception $e) {
        require "V/viewError.php";
    }
}
function viewAddProduct()
{
    try {

        $c = new Category();
        $cats = $c->getAllCategories();
        require "V/viewAddProduct.php";
    } catch (Exception $e) {
        require "V/viewError.php";
    }
}
function addCategory()
{
    try {
        if (empty($_POST["name"])) {

            require "V/viewError.php";
        } else {
            $n =  $_POST['name'];
            $name = test_input($n);
            $c = new Category();
            $c->addCategory($name);
            displayCategory();
        }
    } catch (Exception $e) {
        require "V/viewError.php";
    }
}
function addProduct()
{
    try {
        if (empty($_POST['name'])) {
            require "V/viewError.php";
        } else {
            $categories = [];
            $c = new Category();
            $x = 1;
            $nCat = $c->getLastId()[0]['id'];
            $n =  $_POST['name'];
            $name = test_input($n);
            $s =  $_POST['status'];
            $status = test_input($s);
            $d =  $_POST['description'];
            $description = test_input($d);
            $image =  $_POST['image'];
            while ($x <= $nCat) {
                if (!empty($_POST[strval($x)])) {
                    array_push($categories, $x);
                }
                $x++;
            }
            $p = new Product();
            if($p->addProduct($name, $status, $description, $image)){
                print_r("product already added");
            }
            $id = $p->getProductId($name);
            $p->linkCatToProd($id[0]['id'], $categories);
            displayAllProducts();
        }
    } catch (Exception $e) {
        require "V/viewError.php";
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
