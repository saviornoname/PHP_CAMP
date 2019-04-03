<?php
namespace  application\core;

class Database
{
    private $conn;

    public function  __construct()
    {
        $this->conn = new \mysqli(
            DB_HOST,
            DB_USER,
            DB_PASSWORD,
            DB_NAME
        );
    }

    public  function  getConnection()
    {
        return $this->conn;
    }


}