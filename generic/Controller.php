<?php
namespace generic;

class Controller {
    private $arrChamadas = [];

    public function __construct() {
        $this->arrChamadas = [
            "plantas/lista" => new Acao("Plantas", "listar"),
            "plantas/formulario" => new Acao("Plantas", "formulario"),
            "plantas/inserir" => new Acao("Plantas", "inserir"),
            "plantas/formularioalterar" => new Acao("Plantas", "alterarForm"),
            "plantas/alterar" => new Acao("Plantas", "alterar"),
            "plantas/excluir" => new Acao("Plantas", "excluir"),
            "usuarios/lista" => new Acao("Usuarios", "listar"),
            "usuarios/formulario" => new Acao("Usuarios", "formulario"),
            "usuarios/inserir" => new Acao("Usuarios", "inserir"),
            "usuarios/formularioalterar" => new Acao("Usuarios", "alterarForm"),
            "usuarios/alterar" => new Acao("Usuarios", "alterar"),
            "usuarios/excluir" => new Acao("Usuarios", "excluir"),
            "cuidados/lista" => new Acao("Cuidados", "listar"),
            "cuidados/formulario" => new Acao("Cuidados", "formulario"),
            "cuidados/inserir" => new Acao("Cuidados", "inserir"),
            "cuidados/formularioalterar" => new Acao("Cuidados", "alterarForm"),
            "cuidados/alterar" => new Acao("Cuidados", "alterar"),
            "cuidados/excluir" => new Acao("Cuidados", "excluir")
        ];
    }

    public function verificarChamadas($rota) {
        if (isset($this->arrChamadas[$rota])) {
            $acao = $this->arrChamadas[$rota];
            $acao->executar();
            return;
        }
        echo "Rota não existe!";
    }
}