<?php
namespace dao;

interface IPlantaDAO {
    public function listar();
    public function inserir($nome_cientifico, $nome_popular);
    public function listarId($id);
    public function alterar($id, $nome_cientifico, $nome_popular);
}