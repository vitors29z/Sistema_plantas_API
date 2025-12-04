<?php
namespace controller;

use service\UsuarioService;

class Usuarios {

    public function listar() {
        $service = new UsuarioService();
        return $service->listar();
    }

    public function inserir($nome, $email) {
        $service = new UsuarioService();
        return $service->inserir($nome, $email);
    }

    public function alterar($id, $nome, $email) {
        $service = new UsuarioService();
        return $service->alterar($id, $nome, $email);
    }

    public function excluir($id) {
        $service = new UsuarioService();
        return $service->excluir($id);
    }

    public function formulario() {
        return ["view" => "usuarios/form"];
    }

    public function formularioalterar($id) {
        $service = new UsuarioService();
        return $service->buscar($id);
    }
}