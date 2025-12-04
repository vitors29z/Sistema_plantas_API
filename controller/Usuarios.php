<?php

namespace controller;

use service\UsuarioService;
use template\UsuarioTemp;
use template\ITemplate;


class Usuarios 
{
    public function __construct()
    {

    }

    public function listar()
    {
        $service = new UsuarioService();
        $resultado = $service->listarUsuarios();
        return $resultado;
    }

    public function inserir ($nome, $endereco)
    {
        $service = new UsuarioService();
        $resultado = $service->inserir($nome, $endereco);
        return $resultado;
    }

    public function teste($nome, $telefone)
    {
        return "$nome,$telefone";
    }
    public function teste2() {}
}
    
