<?php
namespace service;

use dao\mysql\CuidadoDAO;

class CuidadoService {
    
    public function inserir($usuario_id, $planta_id, $tipo_cuidado, $frequencia) {
        $dao = new CuidadoDAO();
        try {
            if ($dao->inserir($usuario_id, $planta_id, $tipo_cuidado, $frequencia)) {
                return ["sucesso" => "Cuidado registrado"];
            }
        } catch (\Exception $e) {

            return ["erro" => "Erro: Verifique se o ID do usuário e da planta existem."];
        }
        return ["erro" => "Erro ao registrar cuidado"];
    }

    public function listar() {
        $dao = new CuidadoDAO();
        return $dao->listar();
    }

    public function alterar($id, $usuario_id, $planta_id, $tipo_cuidado, $frequencia) {
        $dao = new CuidadoDAO();
        if ($dao->alterar($id, $usuario_id, $planta_id, $tipo_cuidado, $frequencia)) {
            return ["sucesso" => "Registro atualizado"];
        }
        return ["erro" => "Erro ao atualizar"];
    }

    public function excluir($id) {
        $dao = new CuidadoDAO();
        if ($dao->excluir($id)) {
            return ["sucesso" => "Registro excluído"];
        }
        return ["erro" => "Erro ao excluir"];
    }
    
    public function buscar($id) {
        $dao = new CuidadoDAO();
        return $dao->buscarPorId($id);
    }
}