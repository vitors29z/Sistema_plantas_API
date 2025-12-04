<?php
namespace generic;

use generic\MysqlFactory;

class MysqlSingleton
{
    private static $instance = null;
    private $conexao;

    private function __construct()
    {
        
        $this->conexao = (new MysqlFactory())->getConnection();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnect()
    {
        return $this->conexao;
    }
}