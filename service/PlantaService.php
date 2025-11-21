<?php
namespace service;

use dao\mysql\PlantaDAO;

class PlantaService extends PlantaDAO {
    public function listarPlantas() {
        return parent::listar();
    }

    public function inserir($nome_cientifico, $nome_popular) {
        return parent::inserir($nome_cientifico, $nome_popular);
    }

    public function alterar($id, $nome_cientifico, $nome_popular) {
        return parent::alterar($id, $nome_cientifico, $nome_popular);
    }

    public function listarId($id) {
        return parent::listarId($id);
    }
    public function excluir($id) {
        return parent::excluir($id);
    }
}