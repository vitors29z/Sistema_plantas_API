<?php
namespace controller;

use service\CuidadoService;
use template\CuidadoTemp;
use template\ITemplate;
use service\UsuarioService;
use service\PlantaService;

class Cuidados {
    private ITemplate $template;

    public function __construct() {
        $this->template = new CuidadoTemp();
    }

    public function listar() {
        $service = new CuidadoService();
        $resultado = $service->listarCuidados();
        $this->template->layout("\\public\\cuidados\\listar.php", $resultado);
    }

    public function inserir() {
        $usuario_id = $_POST["usuario_id"];
        $planta_id = $_POST["planta_id"];
        $tipo_cuidado = $_POST["tipo_cuidado"];
        $frequencia = $_POST["frequencia"];
        $service = new CuidadoService();
        $resultado = $service->inserir($usuario_id, $planta_id, $tipo_cuidado, $frequencia);
        header("location: /sistema_plantas/cuidados/lista?info=1");
    }

    // controller/Cuidados.php
    public function formulario() {
        $usuarioService = new UsuarioService();
        $usuarios = $usuarioService->listarUsuarios();
        $plantaService = new PlantaService();
        $plantas = $plantaService->listarPlantas();
        // Passe os dados de usuarios e plantas
        $this->template->layout("\\public\\cuidados\\form.php", ["usuarios" => $usuarios, "plantas" => $plantas]);
}

    public function alterarForm() {
        $id = $_GET["id"];
        $service = new CuidadoService();
        $resultado = $service->listarId($id);
        $usuarioService = new UsuarioService();
        $usuarios = $usuarioService->listarUsuarios();
        $plantaService = new PlantaService();
        $plantas = $plantaService->listarPlantas();
        $this->template->layout("\\public\\cuidados\\form.php", ["cuidado" => $resultado, "usuarios" => $usuarios, "plantas" => $plantas]);
    }

    public function alterar() {
        $id = $_POST["id"];
        $usuario_id = $_POST["usuario_id"];
        $planta_id = $_POST["planta_id"];
        $tipo_cuidado = $_POST["tipo_cuidado"];
        $frequencia = $_POST["frequencia"];
        $service = new CuidadoService();
        $service->alterar($id, $usuario_id, $planta_id, $tipo_cuidado, $frequencia);
        header("location: /sistema_plantas/cuidados/lista?info=2");
    }

    public function excluir() {
        $id = $_GET["id"];
        $service = new CuidadoService();
        $service->excluir($id);
        header("location: /sistema_plantas/cuidados/lista?info=3");
    }
}