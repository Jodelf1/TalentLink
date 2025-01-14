<?php

namespace app\controllers;

use app\database\models\PerfilEmpresa;
use app\database\models\Auth;
use app\controllers\authController;

class empresaController
{
    private $perfilEmpresa;
    private $auth;

    public function __construct()
    {
        $this->perfilEmpresa = new PerfilEmpresa();
        $this->auth = new Auth();
        $this->authc = new authController;

    }

    // Função para exibir o formulário de criação de perfil
    public function index(){

        //$this->authc->checkAuthentication();
        //$this->authc->protect("empresa");

        $perfil = $this->perfilEmpresa->obterPerfil($_SESSION['user']['id']);

        if(!$perfil){
            header("Location: /c/create/profile");
            exit();
        }else{
            Controller::view("empresa/index");
        }
    }

    // Função para exibir o perfil da empresa
    public function mostrarPerfil(){

        $this->authc->checkAuthentication();
        //$this->authc->protect("empresa");

        // Obtém o perfil da empresa
        $perfil = $this->perfilEmpresa->obterPerfil($_SESSION['user']['id']);
        
        if ($perfil){
            return controller::view("empresa/perfil", ['perfil' => $perfil]); 
        }else{ 
            // Redireciona para uma página de erro
            header("Location: /c/create/profile");
        }
    }

    // Função para exibir os detalhes da empresa
    public function exibirDetalhes($params){
    

        $empresaId = $params['empresaId'];
        // Obtém o perfil da empresa
        $perfil = $this->perfilEmpresa->obterPerfil($empresaId);

        // Se o perfil não existir, redireciona para uma página de erro ou lista de empresas
        if ($perfil) {
            return controller::view("empresa/detalhes", ['perfil' => $perfil]); 
        }else{
            return controller::view('errors/404');
            echo "NÃO EXISTE PERFIL";
        }
    }
    
    // Função para criar o perfil da empresa
    public function criarPerfil(){
        
        $this->authc->checkAuthentication();
        $this->authc->protect("empresa");
        
        if($perfil = $this->perfilEmpresa->obterPerfil($_SESSION['user']['id'])){
            header("Location: /c/perfil");
            exit();
        }

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
                header("Location: /c/{$empresaId}");
                exit();
            } else {
                // Caso haja erro ao criar, redirecionar ou mostrar erro
                echo "Erro ao criar o perfil da empresa!";
            }
        }else{
            controller::view("empresa/createProfile");
       }
       
   }

}

