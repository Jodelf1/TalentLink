<?php

namespace app\database\models;

use app\database\Connection;
use PHPAuth\Config as PHPAuthConfig;
use PHPAuth\Auth as PHPAuth;
use PDOException;

class user{
    public function create($data, $userdetails){
        //Função para criar um usuário

        switch($data['user_type']){
            case 'formador':
                //Registra os dados na tabela de extensão - formador
                break;
            case 'candidato':
                //Registra os dados na tabela de extensão - Cv
                break;
            case 'empresa':
                //Registra os dados na tabela de extensão - empresa
                break;
        }
    }
    
    public function fing($id){
        //Função para encontrar um usuário
    }
    public function findByEmail($email){
        //Função para encontrar um usuário por email
    }
}