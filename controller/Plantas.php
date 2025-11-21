<?php
namespace controller;

use service\PlantaService;
use template\PlantaTemp;
use template\ITemplate;

class Plantas {
    private ITemplate $template;

    public function __construct() {
        $this->template = new PlantaTemp();
    }

    public function listar() {
        $service = new PlantaService();
        $resultado = $service->listarPlantas();
        $this->template->layout("\\public\\plantas\\listar.php", $resultado);
    }

    public function inserir() {
        $nome_cientifico = $_POST["nome_cientifico"];
        $nome_popular = $_POST["nome_popular"];
        $service = new PlantaService();
        $resultado = $service->inserir($nome_cientifico, $nome_popular);
        header("location: /sistema_plantas/plantas/lista?info=1");
    }

    public function formulario() {
        $this->template->layout("\\public\\plantas\\form.php");
    }

    public function alterarForm() {
        $id = $_GET["id"];
        $service = new PlantaService();
        $resultado = $service->listarId($id);
        $this->template->layout("\\public\\plantas\\form.php", $resultado);
    }

    public function alterar() {
        $id = $_POST["id"];
        $nome_cientifico = $_POST["nome_cientifico"];
        $nome_popular = $_POST["nome_popular"];
        $service = new PlantaService();
        $service->alterar($id, $nome_cientifico, $nome_popular);
        header("location: /sistema_plantas/plantas/lista?info=2");
    }

    public function excluir() {
        $id = $_GET["id"];
        $service = new PlantaService();
        $service->excluir($id);
        header("location: /sistema_plantas/plantas/lista?info=3");
    }
}