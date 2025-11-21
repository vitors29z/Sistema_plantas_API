<?php
namespace dao\mysql;

use dao\ICuidadoDAO;
use generic\MysqlFactory;

class CuidadoDAO extends MysqlFactory implements ICuidadoDAO {
    public function listar() {
        $sql = "select id, usuario_id, planta_id, tipo_cuidado, frequencia from cuidados";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }

    public function inserir($usuario_id, $planta_id, $tipo_cuidado, $frequencia) {
        $sql = "insert into cuidados (usuario_id, planta_id, tipo_cuidado, frequencia) values (:usuario_id, :planta_id, :tipo_cuidado, :frequencia)";
        $param = [
            ":usuario_id" => $usuario_id,
            ":planta_id" => $planta_id,
            ":tipo_cuidado" => $tipo_cuidado,
            ":frequencia" => $frequencia
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function listarId($id) {
        $sql = "select id, usuario_id, planta_id, tipo_cuidado, frequencia from cuidados where id=:id";
        $param = [
            ":id" => $id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function alterar($id, $usuario_id, $planta_id, $tipo_cuidado, $frequencia) {
        $sql = "update cuidados set usuario_id=:usuario_id, planta_id=:planta_id, tipo_cuidado=:tipo_cuidado, frequencia=:frequencia where id=:id";
        $param = [
            ":usuario_id" => $usuario_id,
            ":planta_id" => $planta_id,
            ":tipo_cuidado" => $tipo_cuidado,
            ":frequencia" => $frequencia,
            ":id" => $id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
    
    public function excluirPorUsuarioId($usuario_id) {
        $sql = "delete from cuidados where usuario_id=:usuario_id";
        $param = [":usuario_id" => $usuario_id];
        return $this->banco->executar($sql, $param);
    }

    public function excluir($id) {
        $sql = "delete from cuidados where id=:id";
        $param = [":id" => $id];
        return $this->banco->executar($sql, $param);
    }
}