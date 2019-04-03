<?php

namespace  application\model;

use application\core\model;

class model_product extends model
{
    public function getDataProduct()
    {
        $sql = 'SELECT products.productID, products.name, products.cost, products.quantity, products.description, 
                products.sku,  products.image,
                categorys.name as CategoryName
                FROM products
                left JOIN categorys
                ON products.categoryID = categorys.categoryID';
        $result = $this->conn->query($sql);
        foreach (mysqli_fetch_all($result,MYSQLI_ASSOC) as $key){
            $data[] = $key;
        }
        return $data;
    }


    public function isUniqProduct($name)
    {
        $sql = 'SELECT * from products WHERE name = "' . $name. '"';
        $result = $this->conn->query($sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            return false;
        }
        return true;
    }

    public function getProductByName($name)
    {
        $sql = 'SELECT * from products WHERE name = "' . $name. '"';
        $result = $this->conn->query($sql);
        return mysqli_fetch_assoc($result);
    }

    public function createProduct(array $dataProduct)
    {
        $sql = 'INSERT INTO products (name, sku, categoryID, quantity, cost, image,description) ' .
            'VALUES (
        "' . $dataProduct['name'] . '", '
            . '"' . $dataProduct['sku'] . '", '
            .  $dataProduct['categoryID'] . ', '
            . $dataProduct['quantity'] . ', '
            . $dataProduct['cost'] . ', '
            . '"' . $dataProduct['image'] . '", '
            .'"'. $dataProduct['description'] . '")';
        return mysqli_query($this->conn, $sql);
    }

    public function deleteProduct($nameProduct)
    {
        $sql = 'DELETE FROM db_store.products
                WHERE name="' . $nameProduct  . '"';
        return mysqli_query($this->conn, $sql);
    }

    public function updateProduct(array $dataProduct)
    {
        $sql = 'UPDATE products ' .
            'SET name="' . $dataProduct['name'] . '", '
            . 'sku="' . $dataProduct['sku'] . '", '
            . 'categoryID=' . $dataProduct['categoryID'] . ', '
            . 'quantity=' . $dataProduct['quantity'] . ', '
            . 'cost=' .$dataProduct['cost'] . ', '
            . 'image="' . $dataProduct['image'] . '", '
            .'description="'. $dataProduct['description'] . '" 
            WHERE productID = ' .$dataProduct['productID'] ;
        return mysqli_query($this->conn, $sql);
    }

    public function isIdProduct($idProduct)
    {
        $sql = 'SELECT * from products WHERE productID = ' . $idProduct;
        $result = $this->conn->query($sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            return mysqli_fetch_assoc($result);
        }
        return false;
    }
}

