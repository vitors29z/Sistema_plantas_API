<?php
namespace controller;

use service\UsuarioService;
use template\UsuarioTemp;
use template\ITemplate;
use service\CuidadoService;

class Usuarios {
    private ITemplate $template;

    public function __construct() {
        $this->template = new UsuarioTemp();
    }

    public function listar() {
        $service = new UsuarioService();
        $resultado = $service->listarUsuarios();
        $this->template->layout("\\public\\usuarios\\listar.php", $resultado);
    }

    public function inserir() {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $service = new UsuarioService();
        $resultado = $service->inserir($nome, $email);
        header("location: /sistema_plantas/usuarios/lista?info=1");
    }

    public function formulario() {
        $this->template->layout("\\public\\usuarios\\form.php");
    }

    public function alterarForm() {
        $id = $_GET["id"];
        $service = new UsuarioService();
        $resultado = $service->listarId($id);
        $this->template->layout("\\public\\usuarios\\form.php", $resultado);
    }

    public function alterar() {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $service = new UsuarioService();
        $service->alterar($id, $nome, $email);
        header("location: /sistema_plantas/usuarios/lista?info=2");
    }
    
    public function excluir() {
        $id = $_GET["id"];
        $service = new UsuarioService();

        // Instancia o serviço de cuidados para excluir os cuidados do usuário primeiro
        $cuidadoService = new CuidadoService();
        $cuidadoService->excluirPorUsuarioId($id);

        // Agora o usuário pode ser excluído
        $service->excluir($id);

        header("location: /sistema_plantas/usuarios/lista?info=3");
    }
}