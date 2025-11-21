<?php
namespace service;

use dao\mysql\CuidadoDAO;

class CuidadoService extends CuidadoDAO {
    public function listarCuidados() {
        return parent::listar();
    }

    public function inserir($usuario_id, $planta_id, $tipo_cuidado, $frequencia) {
        return parent::inserir($usuario_id, $planta_id, $tipo_cuidado, $frequencia);
    }

    public function alterar($id, $usuario_id, $planta_id, $tipo_cuidado, $frequencia) {
        return parent::alterar($id, $usuario_id, $planta_id, $tipo_cuidado, $frequencia);
    }

    public function listarId($id) {
        return parent::listarId($id);
    }

    public function excluir($id) {
        return parent::excluir($id);
    }


    
    public function excluirPorUsuarioId($usuario_id) {
        return parent::excluirPorUsuarioId($usuario_id);
    }
}