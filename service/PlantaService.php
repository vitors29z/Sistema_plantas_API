<?php
namespace service;

use dao\mysql\PlantaDAO;

class PlantaService {
    
    public function inserir($nome_cientifico, $nome_popular) {
        if (empty($nome_cientifico)) return ["erro" => "Nome científico obrigatório"];
        
        $dao = new PlantaDAO();
        if ($dao->inserir($nome_cientifico, $nome_popular)) {
            return ["sucesso" => "Planta cadastrada com sucesso"];
        }
        return ["erro" => "Erro ao cadastrar planta"];
    }

    public function listar() {
        $dao = new PlantaDAO();
        return $dao->listar();
    }

    public function alterar($id, $nome_cientifico, $nome_popular) {
        $dao = new PlantaDAO();
        if ($dao->alterar($id, $nome_cientifico, $nome_popular)) {
            return ["sucesso" => "Planta atualizada"];
        }
        return ["erro" => "Erro ao atualizar"];
    }

    public function excluir($id) {
        $dao = new PlantaDAO();
        
        try {
            if ($dao->excluir($id)) {
                return ["sucesso" => "Planta excluída"];
            }
        } catch (\Exception $e) {
            return ["erro" => "Não é possível excluir: existem cuidados vinculados a esta planta."];
        }
        return ["erro" => "Erro ao excluir"];
    }
    
    public function buscar($id) {
        $dao = new PlantaDAO();
        return $dao->buscarPorId($id);
    }
}