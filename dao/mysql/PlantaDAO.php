<?php
namespace dao\mysql;

use generic\MysqlSingleton;
use PDO;

class PlantaDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = MysqlSingleton::getInstance()->getConnect();
    }

    public function inserir($nome_cientifico, $nome_popular) {
        $sql = "INSERT INTO plantas (nome_cientifico, nome_popular) VALUES (:nc, :np)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nc', $nome_cientifico);
        $stmt->bindValue(':np', $nome_popular);
        return $stmt->execute();
    }

    public function listar() {
        $sql = "SELECT * FROM plantas ORDER BY nome_popular";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function alterar($id, $nome_cientifico, $nome_popular) {
        $sql = "UPDATE plantas SET nome_cientifico = :nc, nome_popular = :np WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nc', $nome_cientifico);
        $stmt->bindValue(':np', $nome_popular);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function excluir($id) {
        $sql = "DELETE FROM plantas WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM plantas WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}