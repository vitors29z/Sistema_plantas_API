<?php
namespace dao\mysql;

use dao\IUsuarioDAO;
use generic\MysqlFactory;

class UsuarioDAO extends MysqlFactory implements IUsuarioDAO {
    public function listar() {
        $sql = "select id, nome, email from usuarios";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }

    public function inserir($nome, $email) {
        $sql = "insert into usuarios (nome, email) values (:nome, :email)";
        $param = [
            ":nome" => $nome,
            ":email" => $email
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function listarId($id) {
        $sql = "select id, nome, email from usuarios where id=:id";
        $param = [
            ":id" => $id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function alterar($id, $nome, $email) {
        $sql = "update usuarios set nome=:nome, email=:email where id=:id";
        $param = [
            ":nome" => $nome,
            ":email" => $email,
            ":id" => $id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function excluir($id) {
        $sql = "delete from usuarios where id=:id";
        $param = [":id" => $id];
        return $this->banco->executar($sql, $param);
}
}