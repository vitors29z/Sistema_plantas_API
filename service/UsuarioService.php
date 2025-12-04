<?php
namespace service;

use dao\mysql\UsuarioDAO;
use Exception;

class UsuarioService {
    
    public function inserir($nome, $email) {
        $dao = new UsuarioDAO();
        
        try {
            if ($dao->inserir($nome, $email)) {
                return ["sucesso" => "Usuário criado"];
            }
        } catch (Exception $e) {
            return ["erro" => "Erro (talvez email duplicado?)"];
        }
        return ["erro" => "Erro ao criar usuário"];
    }

    public function listar() {
        $dao = new UsuarioDAO();
        return $dao->listar();
    }

    public function alterar($id, $nome, $email) {
        $dao = new UsuarioDAO();
        if ($dao->alterar($id, $nome, $email)) {
            return ["sucesso" => "Usuário alterado"];
        }
        return ["erro" => "Erro ao alterar"];
    }

    public function excluir($id) {
        $dao = new UsuarioDAO();
        if ($dao->excluir($id)) {
            return ["sucesso" => "Usuário excluído"];
        }
        return ["erro" => "Erro ao excluir"];
    }
    
    public function buscar($id) {
        $dao = new UsuarioDAO();
        return $dao->buscarPorId($id);
    }
}