<?php

namespace app\controllers;

use app\database\models\Auth;

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
        return Controller::view('auth/register'); // mudar VIEW_REGISTER para a página de registo
    }

    public function adminRegister()
    {
        //Função para visualizar o formulário de registo do administrador
    }

    public function store()
    {
        //Função para criar um utilizador
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password_confirm = $_POST['password_confirm'];
                $data = [
                    "user_type" => $_POST['user_type'],
                    "isactive" => 0
                ];
    
                $result = $this->auth->register($email, $password, $password_confirm, $data);
    
                if ($result['error']) {
                    echo $result['message'];  // Exibe a mensagem de erro
                } else {
                    $msg = 'Registro bem-sucedido! Verifique seu e-mail para ativar a conta.';
                    Controller::view('/register', ['msg' => $msg]);
                    // Controller::view('admin/utilizadores/index', ['msg' => $msg, 'utilizadores' => $users]);
                }
            }
    
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