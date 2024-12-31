<?php

namespace app\database\models;

use app\database\Connection;
use PHPAuth\Config as PHPAuthConfig;
use PHPAuth\Auth as PHPAuth;
use PDOException;

class Auth
{
    private $auth;
    private $pdo;

    public function __construct()
    {
        // Conecta ao banco de dados
        $pdo = Connection::connect();

        // Configura e inicializa o PHPAuth
        $config = new PHPAuthConfig($pdo);
        $this->auth = new PHPAuth($pdo, $config);
    }

    public function register($email, $password, $password_confirm, $data = [])
    {
        try {
            return $this->auth->register($email, $password, $password_confirm, $data);
        } catch (PDOException $e) {
            echo 'Registration failed: ' . $e->getMessage();
        }
    }

    public function login($email, $password)
    {
        try {
            return $this->auth->login($email, $password);
        } catch (PDOException $e) {
            echo 'Login failed: ' . $e->getMessage();
        }
    }

    public function logout($hash)
    {
        return $this->auth->logout($hash);
    }

    public function isLogged()
    {
        try {
            return $this->auth->isLogged();
        } catch (PDOException $e) {
            echo 'Check login status failed: ' . $e->getMessage();
        }
    }
    public function forgotPassword($email)
    {
        try {
            return $this->auth->requestReset($email);
        } catch (PDOException $e) {
            echo 'Password reset request failed: ' . $e->getMessage();
        }
    }

    public function resetPassword($key, $password, $password_confirm)
    {
        try {
            return $this->auth->resetPass($key, $password, $password_confirm);
        } catch (PDOException $e) {
            echo 'Password reset failed: ' . $e->getMessage();
        }
    }
}