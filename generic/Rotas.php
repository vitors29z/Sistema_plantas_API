<?php 

namespace generic;

class Rotas
{
    private $endpoints = [];

    public function __construct()
    {
        
        $this->endpoints = [

            "usuarios" => new Acao([
                Acao::POST => new Endpoint("Usuarios", "inserir"),
                Acao::GET => new Endpoint("Usuarios", "listar"), 
                Acao::PUT => new Endpoint("Usuarios", "alterar"),
                Acao::DELETE => new Endpoint("Usuarios", "excluir")
            ]),

            
            "usuarios/formulario" => new Acao([
                Acao::GET => new Endpoint("Usuarios", "formulario")
            ]),
            "usuarios/formularioalterar" => new Acao([
                Acao::GET => new Endpoint("Usuarios", "formularioalterar")
            ]),
            "usuarios/excluir" => new Acao([
                Acao::GET => new Endpoint("Usuarios", "excluir") 
            ]),

            "plantas" => new Acao([
                Acao::POST => new Endpoint("Plantas", "inserir"),
                Acao::GET => new Endpoint("Plantas", "listar"),
                Acao::PUT => new Endpoint("Plantas", "alterar"),
                Acao::DELETE => new Endpoint("Plantas", "excluir")
            ]),

            
            "plantas/formulario" => new Acao([
                Acao::GET => new Endpoint("Plantas", "formulario")
            ]),
            "plantas/formularioalterar" => new Acao([
                Acao::GET => new Endpoint("Plantas", "formularioalterar")
            ]),
            "plantas/excluir" => new Acao([
                Acao::GET => new Endpoint("Plantas", "excluir")
            ]),


            "cuidados" => new Acao([
                Acao::POST => new Endpoint("Cuidados", "inserir"),
                Acao::GET => new Endpoint("Cuidados", "listar"),
                Acao::PUT => new Endpoint("Cuidados", "alterar"),
                Acao::DELETE => new Endpoint("Cuidados", "excluir")
            ]),
            
            
            "cuidados/formulario" => new Acao([
                Acao::GET => new Endpoint("Cuidados", "formulario")
            ]),
            "cuidados/formularioalterar" => new Acao([
                Acao::GET => new Endpoint("Cuidados", "alterarForm")
            ]),
            "cuidados/lista" => new Acao([ 
                Acao::GET => new Endpoint("Cuidados", "listar")
            ]),
            "cuidados/excluir" => new Acao([
                Acao::GET => new Endpoint("Cuidados", "excluir")
            ])
            
        ];
    }

    public function executar ($rota)
    {
        if (isset($this->endpoints[$rota])){
            
            $endpoint = $this->endpoints[$rota];
            $dados = $endpoint->executar();
            $retorno = new Retorno ();
            $retorno -> dados = $dados;
            return $retorno;
        }

        return null;
    }
}
