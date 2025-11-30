<?php

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTAuth
{
    private string $key = ""

    public function criarChave($dados)
    {
        $hora = time();
        $payload = [
            'iat' => $hora
            'exp' => $hora + 180000
            'uid' => $dados
        ];

        $jwt = JWT::encode($payload, $this->key, 'HS256');
        return $jwt;
    }

    public function verificar()
    {
        try{
            if(!isset($_SERVER['HTTP_AUTHORIZATION'])){
                http_response_code(406);
                return false;
            }
            $autorizacao = $_SERVER['HTTP_AUTHORIZATION'];
            $token = str_replace('Bearer ', '', $autorizacao);
            $decodificar = Jwt::decode($token, new Key($this->key, 'HS256'));
            $hora = time();
            if($hora > $decodificar->exp){
                http_response_code(408);
                return false;
            }

            return $decodificar;
        } catch(Exception $e){
            http_response_code(401);
            return false;
        }
    }
}
