<?php
namespace dao\mysql;

use dao\IPlantaDAO;
use generic\MysqlFactory;

class PlantaDAO extends MysqlFactory implements IPlantaDAO {
    public function listar() {
        $sql = "select id, nome_cientifico, nome_popular from plantas";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }

    public function inserir($nome_cientifico, $nome_popular) {
        $sql = "insert into plantas (nome_cientifico, nome_popular) values (:nome_cientifico, :nome_popular)";
        $param = [
            ":nome_cientifico" => $nome_cientifico,
            ":nome_popular" => $nome_popular
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function listarId($id) {
        $sql = "select id, nome_cientifico, nome_popular from plantas where id=:id";
        $param = [
            ":id" => $id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function alterar($id, $nome_cientifico, $nome_popular) {
        $sql = "update plantas set nome_cientifico=:nome_cientifico, nome_popular=:nome_popular where id=:id";
        $param = [
            ":nome_cientifico" => $nome_cientifico,
            ":nome_popular" => $nome_popular,
            ":id" => $id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }


    public function excluir($id) {
        $sql = "delete from plantas where id=:id";
        $param = [":id" => $id];
        return $this->banco->executar($sql, $param);
}

}