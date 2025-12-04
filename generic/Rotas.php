<?php 

namespace generic;

class Rotas
{
    private $endpoints = [];

    public function __construct()
    {
        // Mapeamento de rotas para URLs (Ex: /sistema_plantas/usuarios/...)
        $this->endpoints = [
            
            // =============================================================
            // ROTAS DE USUARIOS
            // =============================================================
            "usuarios" => new Acao([
                Acao::POST => new Endpoint("Usuarios", "inserir"), // Criar (POST)
                Acao::GET => new Endpoint("Usuarios", "listar"),    // Ler/Listar (GET)
                Acao::PUT => new Endpoint("Usuarios", "alterar"),  // Atualizar (PUT) - se voce usar PUT
                Acao::DELETE => new Endpoint("Usuarios", "excluir") // Deletar (DELETE) - se voce usar DELETE
            ]),

            // Rotas que usam o metodo GET para acoes específicas de tela
            "usuarios/formulario" => new Acao([
                Acao::GET => new Endpoint("Usuarios", "formulario") // Formulario de Insercaoo
            ]),
            "usuarios/formularioalterar" => new Acao([
                Acao::GET => new Endpoint("Usuarios", "formularioalterar") // Formulario de Alteracao
            ]),
            "usuarios/excluir" => new Acao([
                Acao::GET => new Endpoint("Usuarios", "excluir") // Exclusao via GET (Como voce fez nas views)
            ]),
            
            // =============================================================
            // ROTAS DE PLANTAS
            // =============================================================
            "plantas" => new Acao([
                Acao::POST => new Endpoint("Plantas", "inserir"),
                Acao::GET => new Endpoint("Plantas", "listar"),
                Acao::PUT => new Endpoint("Plantas", "alterar"),
                Acao::DELETE => new Endpoint("Plantas", "excluir")
            ]),

            // Rotas que usam o metodo GET para acoes especificas de tela
            "plantas/formulario" => new Acao([
                Acao::GET => new Endpoint("Plantas", "formulario")
            ]),
            "plantas/formularioalterar" => new Acao([
                Acao::GET => new Endpoint("Plantas", "formularioalterar")
            ]),
            "plantas/excluir" => new Acao([
                Acao::GET => new Endpoint("Plantas", "excluir")
            ]),

            // =============================================================
            // ROTAS DE CUIDADOS
            // =============================================================
            "cuidados" => new Acao([
                Acao::POST => new Endpoint("Cuidados", "inserir"),
                Acao::GET => new Endpoint("Cuidados", "listar"),
                Acao::PUT => new Endpoint("Cuidados", "alterar"),
                Acao::DELETE => new Endpoint("Cuidados", "excluir")
            ]),
            
            // Rotas que usam o metodo GET para acoes especificas de tela
            "cuidados/formulario" => new Acao([
                Acao::GET => new Endpoint("Cuidados", "formulario")
            ]),
            "cuidados/formularioalterar" => new Acao([
                Acao::GET => new Endpoint("Cuidados", "alterarForm") // Nome do metodo no seu Controller: alterarForm()
            ]),
            "cuidados/lista" => new Acao([ // Rota usada no header location
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
