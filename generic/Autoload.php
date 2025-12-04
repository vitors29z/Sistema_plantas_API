<?php
spl_autoload_register(function($class){

    $diretorioBase = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
    $caminhoArquivo = $diretorioBase . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    
    if (file_exists($caminhoArquivo)) {
        require_once $caminhoArquivo;
    } 
});