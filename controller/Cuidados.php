<?php
namespace controller;

use service\CuidadoService;
use service\UsuarioService; // Para popular selects no form
use service\PlantaService;  // Para popular selects no form

class Cuidados {

    public function listar() {
        $service = new CuidadoService();
        return $service->listar();
    }

    public function inserir($usuario_id, $planta_id, $tipo_cuidado, $frequencia) {
        $service = new CuidadoService();
        return $service->inserir($usuario_id, $planta_id, $tipo_cuidado, $frequencia);
    }

    public function alterar($id, $usuario_id, $planta_id, $tipo_cuidado, $frequencia) {
        $service = new CuidadoService();
        return $service->alterar($id, $usuario_id, $planta_id, $tipo_cuidado, $frequencia);
    }

    public function excluir($id) {
        $service = new CuidadoService();
        return $service->excluir($id);
    }

    public function formulario() {
        // Para o form de cuidados, geralmente precisamos da lista de usuarios e plantas para o <select>
        $userService = new UsuarioService();
        $plantaService = new PlantaService();
        
        return [
            "usuarios" => $userService->listar(),
            "plantas" => $plantaService->listar()
        ];
    }

    // Atenção: No Rotas.php você definiu o metodo como "alterarForm"
    public function alterarForm($id) {
        $service = new CuidadoService();
        $userService = new UsuarioService();
        $plantaService = new PlantaService();

        return [
            "cuidado" => $service->buscar($id),
            "usuarios" => $userService->listar(),
            "plantas" => $plantaService->listar()
        ];
    }
}