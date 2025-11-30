<?php 

namespace generic;

class Rotas
{
    private $endpoints = [];

    public function __construct()
    {
            $this->endpoints = [
                "cliente" => new Acao([
                        Acao::POST => new Endpoint("Cliente","inserir"),
                        Acao::GET => new Endpoint("Cliente","listar")
                ]),
                "plantas" =>new Acao([

                    Acao::GET => new Endpoint("Planta","teste")
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