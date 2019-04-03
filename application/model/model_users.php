<?php

namespace  application\model;

use application\core\model;

class model_users extends model
{
    public function getDataUser()
    {
        $sql = 'SELECT * FROM users';
        $result = $this->conn->query($sql);

        foreach (mysqli_fetch_all($result,MYSQLI_ASSOC) as $key){
            $data[] = $key;
        }
        return $data;
    }

    public function editUser($dataUser)
    {
        $sql = $sql = 'UPDATE users' .
            ' SET '
            . 'email = "' . $dataUser['email'] . '", '
            . 'firstname = "' . $dataUser['firstname'] . '", '
            . 'lastname = "' . $dataUser['lastname'] . '", '
            . 'phone = "' . $dataUser['phone'] . '", '
            . 'age = ' . $dataUser['age'] . ', '
            . 'sex = ' . $dataUser['sex']
            . ' WHERE login="'.$dataUser['login'].'"';
        return mysqli_query($this->conn, $sql);
    }

    public function singUp($dataUser)
    {
        $sql = 'INSERT INTO users (login, password, email, firstname, lastname, phone, age, sex) ' .
            'VALUES (
        "' . $dataUser['login'] . '", '
            . '"' . sha1($dataUser['password']) . '", '
            . '"' . $dataUser['email'] . '", '
            . '"' . $dataUser['firstname'] . '", '
            . '"' . $dataUser['lastname'] . '", '
            . '"' . $dataUser['phone'] . '", '
            . $dataUser['age'] . ', '
            . $dataUser['sex']
            . ')';
        return mysqli_query($this->conn, $sql);
    }

    public function addAddress($dataUser)
    {
        $sql = 'INSERT INTO addresses (user_id, country, city, address) ' .
            'VALUES ('
            . $dataUser['user_id'] . ', '
            . '"' . $dataUser['country'] . '", '
            . '"' . $dataUser['city'] . '", '
            . '"' . $dataUser['address'] . '")';
        return mysqli_query($this->conn, $sql);
    }

    public function editAddress($dataUser)
    {
        $sql = $sql = 'UPDATE addresses' .
            ' SET '
            . 'user_id = "' . $dataUser['user_id'] . '", '
            . 'country = "' . $dataUser['country'] . '", '
            . 'city = "' . $dataUser['city'] . '", '
            . 'address = "' . $dataUser['address'] . '" '
            . ' WHERE user_id="'.$dataUser['user_id'].'"';
        return mysqli_query($this->conn, $sql);
    }

    public function isUniqLogin($login)
    {
        $sql = 'SELECT * from users WHERE login = "' . $login. '"';
        $result = $this->conn->query($sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            return false;
        }
        return true;
    }


    public function userAuthorization($userLogin, $userPass)
    {
        $sql = 'SELECT * FROM users WHERE  login = "' . $userLogin .'" && password = "' . sha1($userPass) . ' "' ;
        return ($res = mysqli_fetch_assoc(mysqli_query($this->conn,$sql))) ? $res : [];
    }

    public function userDataByLogin($userLogin)
    {
        $sql = 'SELECT * FROM users WHERE  login = "' . $userLogin . '"';
        return ($res = mysqli_fetch_assoc(mysqli_query($this->conn,$sql))) ? $res : [];
    }

    public function getDataAddress($userId)
    {
        $sql = 'SELECT * 
                FROM addresses
                WHERE user_id = ' . $userId;
        $result = $this->conn->query($sql);

        return mysqli_fetch_assoc($result);
    }

    public function deleteUser($login)
    {
        $sql = 'DELETE FROM db_store.users
                WHERE login = "' . $login  . '"';
        return mysqli_query($this->conn, $sql);
    }
}