<?php

namespace app\controllers;

use app\database\models\Formacao;
use app\database\models\Auth;

class formacaoController
{
    private $formacao;
    private $auth;

    public function __construct()
    {
        $this->formacao = new Formacao();
        $this->auth = new Auth();
    }

    public function index()
    {
        if (!$this->auth->isLogged()) {
            header("Location: /login");
            exit();
        }

        Controller::view("Formacao/formacao");
    }

    public function createFormadores()
    {
        if (!$this->auth->isLogged()) {
            header("Location: /login");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $formadorId = $_SESSION['user']['id'];
            $nomeFormador = $_POST['nome_formador'];
            $bio = $_POST['bio'];
            $especialidades = $_POST['especialidades'];
            $localizacao = $_POST['localizacao'];
            $contato = $_POST['contato'];

            $result = $this->formacao->createFormador($formadorId, $nomeFormador, $bio, $especialidades, $localizacao, $contato);

            if ($result === true) {
                header("Location: /formador/detalhes");
                exit();
            } else {
                echo $result;
            }
        }
    }

    public function detalhesFormacao()
    {
        if (!$this->auth->isLogged()) {
            header("Location: /login");
            exit();
        }

        $formadorId = $_SESSION['user']['id'];
        $perfil = $this->formacao->getPerfilFormador($formadorId);

        if (!$perfil) {
            echo "Perfil não encontrado.";
            return;
        }

        Controller::view("Formacao/detalhesFormacao", ['perfil' => $perfil]);
    }
}
