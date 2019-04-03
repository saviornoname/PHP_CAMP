<?php

namespace  application\model;

use application\core\model;

class model_category extends model
{
    public function getDataCategory()
    {
        $sql = 'SELECT * FROM categorys';
        $result = $this->conn->query($sql);
        foreach (mysqli_fetch_all($result) as $row){
            $data[$row[0]]['name'] = $row[1];
            $data[$row[0]]['parentId'] = $row[2];
        }
        return $data;
    }

    public function createCategory($dataCategory)
    {
        $sql = 'INSERT INTO db_store.categorys (name, parentID)
        VALUES(
        "' . $dataCategory['name'] . '", '
            . $dataCategory['parent_id']
            . ')';
        return mysqli_query($this->conn, $sql);
    }

    public function isUniqCategory($nameCategory)
    {
        $sql = 'SELECT * from categorys WHERE name = "' . $nameCategory. '"';
        $result = $this->conn->query($sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            return false;
        }
        return true;
    }

    public function isIdCategory($idCategory)
    {
        $sql = 'SELECT * from categorys WHERE categoryID = ' . $idCategory;
        $result = $this->conn->query($sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            return mysqli_fetch_assoc($result);
        }
        return false;
    }


    public function updateCategory($inputData)
    {
        $sql = $sql = 'UPDATE categorys' .
            ' SET '
            . 'name="' . $inputData['name'] . '", '
            . 'parentID ='.$inputData['parent']
            . ' WHERE categoryID = '.$inputData['id'];
        return mysqli_query($this->conn, $sql);
    }


    public function deleteCategory($nameCategory)
    {
        $sql = 'DELETE FROM db_store.categorys
                WHERE name="' . $nameCategory  . '"';
        return mysqli_query($this->conn, $sql);
    }

}