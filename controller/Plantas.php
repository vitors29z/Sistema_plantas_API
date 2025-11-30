<?php
namespace controller;

use service\PlantaService;
use template\PlantaTemp;
use template\ITemplate;

class Plantas
{
    public function __construct()
    {

    }

    public function listar(){
    $service = new PlantaService();
    $resultado = $service->listarPlantas();
    return $resultado;
    }

    public function inserir($nome_popular,$nome_cientifico)
    {
        $service = new  PlantaService();
        $resultado = $service->inserir($nome_popular,$nome_cientifico);
        return $resultado;
    }

    public function teste($nome_popular,$nome_cientifico)
    {
        return "$nome_popular,$nome_cientifico";
    }
    public function teste2(){}
}
