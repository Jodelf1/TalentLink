<?php

namespace app\controllers;

use app\database\models\Auth;
use app\database\models\Utilizador;

class authController
{

    private $auth;
    public function __construct()
    {
        $this->auth = new Auth(); 
    }

    public function register()
    {
        //Função para visualizar o formulário de registo do utilizador
    }

    public function adminRegister()
    {
        //Função para visualizar o formulário de registo do administrador
    }

    public function store()
    {
        //Função para criar um utilizador
    }

    public function loginForm()
    {
        //Função para visualizar o formulário de login

        if ($this->auth->isLogged()) {
            header('location: LOGGED_IN'); // mudar LOGGED_IN para a página de destino
            exit;
        } else {
            return Controller::view('VIEW_LOGIN'); // mudar VIEW_LOGIN para a página de login
        }
    }

    public function login()
    {
        //Função para fazer login
    }

    public function logout()
    {
        //Função para fazer logout
        $this->auth->logout($_SESSION['user']['hash']);
        session_unset();
        session_destroy();
        header('Location: VIEW_LOGIN'); // mudar VIEW_LOGIN para a página de login
        exit;
    }

    public function isLogged()
    {
        //Função para verificar se o utilizador está logado
        return $this->auth->isLogged();
    }
    protected function checkAuthentication()
    {
        //Função para verificar se o utilizador está autenticado
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }
    }

}