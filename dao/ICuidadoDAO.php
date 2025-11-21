<?php
namespace dao;

interface ICuidadoDAO {
    public function listar();
    public function inserir($usuario_id, $planta_id, $tipo_cuidado, $frequencia);
    public function listarId($id);
    public function alterar($id, $usuario_id, $planta_id, $tipo_cuidado, $frequencia);
}