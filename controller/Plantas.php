<?php
namespace controller;

use service\PlantaService;

class Plantas {

    public function listar() {
        $service = new PlantaService();
        return $service->listar();
    }

    public function inserir($nome_cientifico, $nome_popular) {
        $service = new PlantaService();
        return $service->inserir($nome_cientifico, $nome_popular);
    }

    public function alterar($id, $nome_cientifico, $nome_popular) {
        $service = new PlantaService();
        return $service->alterar($id, $nome_cientifico, $nome_popular);
    }

    public function excluir($id) {
        $service = new PlantaService();
        return $service->excluir($id);
    }

    // Métodos de View (retornam dados para preencher a tela ou caminho)
    public function formulario() {
        return ["view" => "plantas/form"]; 
    }

    public function formularioalterar($id) {
        $service = new PlantaService();
        return $service->buscar($id); // Retorna os dados para preencher o form de edição
    }
}