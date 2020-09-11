<?php

namespace app\utils;

use \PDO;

class MySQLConnection extends PDO
{
    protected string $dsn = 'mysql:host=127.0.0.1; dbname=demo; charset=utf8;';
    protected string $username = 'root';
    protected string $password = 'Duchai9800@';
    protected array $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8;');

    public function __construct()
    {
        parent::__construct($this->dsn, $this->username, $this->password, $this->options);
    }
}