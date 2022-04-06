<?php
require_once "Model.php";

class Product extends Model
{
    function addProduct($name, $description, $status, $image)
    {
        $sql = 'INSERT INTO product (name,description,status,image) VALUES (?,?,?,?)';
        return $this->executeRequest($sql,array($name,$description,$status,$image));
    }
    function linkCatToProd($idProd, $arrayCat)
    {
        foreach ($arrayCat as $idCat) {
            $data=[$idProd,$idCat];
            $sql = 'INSERT INTO productcategories (idProduct,idCategory) VALUES (?,?)';
            $this->executeRequest($sql,$data);
        }
    }
    function getProductId($name)
    {
        $sql = 'SELECT id from product ORDER BY id DESC LIMIT 1';
        return $this->executeRequest($sql);
    }
    function getAllProducts()
    {
        $sql = 'SELECT * from product as p';
        return $this->executeRequest($sql);
    }
    function getAllProductsRandom()
    {
        $sql = 'SELECT * from product as p order by RAND()';
        return $this->executeRequest($sql);
    }

    function getProduct($id)
    {
        $sql = 'SELECT p.id as id , p.name as name, p.status as status, p.description as description, p.image as image from product  p where id =' . $id;
        return $this->executeRequest($sql);
    }

    function getSearch($lookup)
    {
        if (!empty($lookup)) {
            $sql = 'SELECT id,name,description,status,image from product where name LIKE "%' . $lookup . '%" order by name';
        } else {
            $sql = 'SELECT * from product order by RAND() limit 30';
        }
        return $this->executeRequest($sql);
    }

    function getCategories($id)
    {
        $sql = 'SELECT productcategories.idCategory as id, category.name as name FROM productcategories left join category on productcategories.idcategory=category.id  where productcategories.idproduct = ' . $id;
        return $this->executeRequest($sql);
    }

    function getStatus($id)
    {
        $sql = 'SELECT p.status  status from product  p where p.id = ' . $id;
        return $this->executeRequest($sql);
    }

    function getImageProduct($id)
    {
        $sql = 'SELECT p.image  image from product  p where p.id = ' . $id;
        return $this->executeRequest($sql);
    }

    function getDescription($id)
    {
        $sql = 'SELECT p.description  description from product  p where p.id = ' . $id;
        return $this->executeRequest($sql);
    }
}
