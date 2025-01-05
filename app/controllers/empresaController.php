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
    public function index()
    {
        if (!$this->auth->isLogged()) {
            header("Location: /login");
            exit();
        }

        // Exibe o formulário de criação de perfil
        Controller::view("PerfilEmpresa/perfilEmpresa");
    }

    // Controlador empresaController.php

    public function exibirDetalhes($params)
    {
        if (!$this->auth->isLogged()) {
            header("Location: /login");
            exit();
        }
        $empresaId = $params['empresaId'];
        // Obtém o perfil da empresa
        $perfil = $this->perfilEmpresa->obterPerfil($empresaId);

        // Se o perfil não existir, redireciona para uma página de erro ou lista de empresas
        if ($perfil) {
            
           // Exibe a página de detalhes da empresa
            return Controller::view("PerfilEmpresa/detalhes", ['perfil' => $perfil]); 
        }else{
            return Controller::view("errors/404"); 
        }
    

    }
    


    // Função para criar o perfil da empresa
    public function criarPerfil()
{
    if (!$this->auth->isLogged()) {
        header("Location: /login");
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
            header("Location: /empresas/{$empresaId}");
            exit();
        } else {
            // Caso haja erro ao criar, redirecionar ou mostrar erro
            echo "Erro ao criar o perfil da empresa!";
        }
    }
}

    }

