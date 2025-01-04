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
                return Controller::view('auth/register', ['msg' => $msg]);
                // Controller::view('admin/utilizadores/index', ['msg' => $msg, 'utilizadores' => $users]);
            }
        }
    
    }

    public function loginForm()
    {
        //Função para visualizar o formulário de login

        if ($this->auth->isLogged()) {
            switch($_SESSION['user']['user_type']) {
                case 'admin':
                    $destino = '/admin';
                    break;
                case 'empresa':
                    /*setcookie('user', $email, time() + 7 * 24 * 60 * 60, '/');
                    setcookie('user_type', 'empresa', time() + 7 * 24 * 60 * 60, '/');*/
                    $destino = '/empresas';
                    break;
                case 'candidato':
                    $destino = '/u';
                    break;
                case 'formador':
                    $destino = '/formador';
                    break;
            }

            header("location: $destino"); // mudar LOGGED_IN para a página de destino
            exit;
        } else {
            Controller::view('auth/login'); // mudar VIEW_LOGIN para a página de login
        }
    }

    public function login()
    {
        //Função para fazer login

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $result = $this->auth->login($email, $password);
            $_SESSION['error'] = 0;

            if ($result['error']){
                $_SESSION['error']++;
                header('location: /login');
                exit;
            } else {
                $utilizador = new Utilizador;
                $acesso = $utilizador->findByEmail($email);

                $_SESSION['user'] = [
                    'email' => $email,
                    'id' => $acesso['id'],
                    'user_type' => $acesso['user_type'],
                    'hash' => $result['hash']
                ];
                switch($acesso['user_type']) {
                    case 'admin':
                        $destino = '/admin';
                        break;
                    case 'empresa':
                        /*setcookie('user', $email, time() + 7 * 24 * 60 * 60, '/');
                        setcookie('user_type', 'empresa', time() + 7 * 24 * 60 * 60, '/');*/
                        $destino = '/empresas';
                        break;
                    case 'candidato':
                        $destino = '/u';
                        break;
                    case 'formador':
                        $destino = '/formador';
                        break;
                }

                $msg = 'Login bem-sucedido!';

               // header('Location: /empresas');
               // exit;

                header("location: $destino");
                exit;
            }
        }

    }

    public function logout()
    {
        //Função para fazer logout
        $this->auth->logout($_SESSION['user']['hash']);
        session_unset();
        session_destroy();
        header('Location: /login'); // mudar VIEW_LOGIN para a página de login
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