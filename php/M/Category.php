<?php
require_once "Model.php";

class Category extends Model
{
    function getLastId()
    {
        $sql = 'SELECT id FROM category ORDER BY id DESC LIMIT 1';
        return $this->executeRequest($sql);
    }
    function addCategory(string $name)
    {
        $sql = 'INSERT INTO category (name) values(?)';
        $this->executeRequest($sql, array($name));
    }
    function getAllCategories()
    {
        $sql = 'SELECT * from category order by name ';
        return $this->executeRequest($sql);
    }

    function getCategoryProducts($id)
    {
        $sql = 'SELECT p.id  id, p.name  name ,p.description  description, p.status  status, p.image image FROM product  p join productcategories  pc on pc.idProduct=p.id  where pc.idCategory = ' . $id;
        return $this->executeRequest($sql);
    }

    function getCategoryName($id)
    {
        $sql = 'SELECT c.name  name from category  c where c.id = ' . $id;
        return $this->executeRequest($sql);
    }
}
