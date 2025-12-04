<?php
namespace dao\mysql;

use generic\MysqlSingleton;
use PDO;

class CuidadoDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = MysqlSingleton::getInstance()->getConnect();
    }

    public function inserir($usuario_id, $planta_id, $tipo_cuidado, $frequencia) {
        $sql = "INSERT INTO cuidados (usuario_id, planta_id, tipo_cuidado, frequencia) 
                VALUES (:uid, :pid, :tipo, :freq)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':uid', $usuario_id);
        $stmt->bindValue(':pid', $planta_id);
        $stmt->bindValue(':tipo', $tipo_cuidado);
        $stmt->bindValue(':freq', $frequencia);
        return $stmt->execute();
    }

    public function listar() {
        $sql = "SELECT c.id, c.tipo_cuidado, c.frequencia, u.nome as nome_usuario, p.nome_popular as nome_planta 
                FROM cuidados c
                JOIN usuarios u ON c.usuario_id = u.id
                JOIN plantas p ON c.planta_id = p.id
                ORDER BY c.id DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function alterar($id, $usuario_id, $planta_id, $tipo_cuidado, $frequencia) {
        $sql = "UPDATE cuidados 
                SET usuario_id = :uid, planta_id = :pid, tipo_cuidado = :tipo, frequencia = :freq 
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':uid', $usuario_id);
        $stmt->bindValue(':pid', $planta_id);
        $stmt->bindValue(':tipo', $tipo_cuidado);
        $stmt->bindValue(':freq', $frequencia);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function excluir($id) {
        $sql = "DELETE FROM cuidados WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM cuidados WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}