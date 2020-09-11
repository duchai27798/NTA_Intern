<?php

namespace app\utils;

class Model
{
    protected MySQLConnection $db;

    public function __construct()
    {
        $this->db = new MySQLConnection();
    }
}