<?php
namespace generic;

use PDO;
use PDOException;

class MysqlFactory
{
    public function getConnection()
    {
        $host = "localhost";
        $db_name = "sistema_plantas"; 
        $username = "root";
        $password = ""; 

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->exec("set names utf8");
            
            return $pdo;
        } catch(PDOException $e) {
            echo "Erro na conexão com o banco: " . $e->getMessage();
            exit;
        }
    }
}