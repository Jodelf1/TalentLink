<?php

namespace app\controllers;

use app\database\models\PerfilEmpresa;
use app\database\models\Auth;

class empresaController
{
    private $perfilEmpresa;
    private $auth;

    public function __construct()
    {
        $this->perfilEmpresa = new PerfilEmpresa();
        $this->auth = new Auth();
    }

    // Função para exibir o formulário de criação de perfil
    public function index(){
        if (!$this->auth->isLogged()) {
            header("Location: /login");
            exit();
        }

        if(!$this->perfilEmpresa->obterPerfil($_SESSION['user']['id'])){
            header("Location: /empresas/create/profile");
            exit();
        }else{
            Controller::view("empresa/index");
        }
    }

    // Controlador empresaController.php
    public function exibirDetalhes($params){
        if (!$this->auth->isLogged()) {
            header("Location: /login");
            exit();
        }
        $empresaId = $params['empresaId'];
        // Obtém o perfil da empresa
        $perfil = $this->perfilEmpresa->obterPerfil($empresaId);
        
        // Se o perfil não existir, redireciona para uma página de erro ou lista de empresas
        if ($perfil) {
            return controller::view("empresa/detalhes", ['perfil' => $perfil]); 
        }else{
            return controller::view("errors/404");  // Redireciona para uma página de erro
        }
    }

    public function mostrarPerfil(){
        if (!$this->auth->isLogged()) {
            header("Location: /login");
            exit();
        }
        // Obtém o perfil da empresa
        $empresaId = $_SESSION['user']['id'];
        $perfil = $this->perfilEmpresa->obterPerfil($empresaId);
        
        if ($perfil){
            return controller::view("empresa/perfil", ['perfil' => $perfil]); 
        }else{
            return controller::view("errors/404");  // Redireciona para uma página de erro
        }
    }
    
    // Função para criar o perfil da empresa
    public function criarPerfil(){
        if (!$this->auth->isLogged()) {
            header("Location: /login");
            exit();
        }
        if($perfil = $this->perfilEmpresa->obterPerfil($empresaId)){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $empresaId = $_SESSION['user']['id']; // ID da empresa, que deve estar no contexto de login ou sessão
                $nomeEmpresa = $_POST['nome_empresa'];
                $descricao = $_POST['descricao'];
                $localizacao = $_POST['localizacao'];
                $site = $_POST['site'];
                $telefone = $_POST['telefone'];
        
                // Chama o método do Model para criar o perfil
                $result = $this->perfilEmpresa->criarPerfil($empresaId, $nomeEmpresa, $descricao, $localizacao, $site, $telefone);
        
                if ($result) {
                    // Após a criação, redireciona para a página de detalhes da empresa recém-criada
                    header("Location: /empresas/{$empresaId}");
                    exit();
                } else {
                    // Caso haja erro ao criar, redirecionar ou mostrar erro
                    echo "Erro ao criar o perfil da empresa!";
                }
            }else{
                controller::view("empresa/createProfile");
            }
        }else{
            header("Location: /empresas/edit/profile");
        }
   }

}

