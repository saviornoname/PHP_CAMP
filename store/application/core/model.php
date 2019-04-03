<?php

namespace  application\core;

use application\components\UserAuthentication;
use application\components\Validate;

/**
 * @property Validate validate
 */
class Model
{
    public $db;

    public $validate;

    public  $conn;

    public function  __construct()
    {
        $this->db = new Database();
        $this->validate = new Validate();

        $this->conn = $this->db->getConnection();
    }
}