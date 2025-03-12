<?php

namespace app\controllers;

use app\database\models\Formacao;
use app\database\models\Formador;
use app\database\models\Auth;

class formacaoController
{
    private $formacao;
    private $formador;
    private $auth;

    public function __construct()
    {
        $this->formacao = new Formacao();
        $this->formador = new Formador();
        $this->auth = new Auth();
    }

    // Exibir index das formações
    public function index()
    {
        $formacoes = $this->formacao->listarFormacoes();

        Controller::view("Formacao/ListarFormacao", ['formacoes' => $formacoes]);
    }

    // Exibir o formulário de criação de formação
    public function criarTela()
    {
        if (!$this->auth->isLogged()) {
            header("Location: /login");
            exit();
        }

        Controller::view("Formacao/CriarTelaFormacao");
    }

    // Lógica para criar a formação
    public function criarFormacao()
    {
        if (!$this->auth->isLogged()) {
            header("Location: /login");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'formador_id' => $_SESSION['user']['id'],
                'titulo' => $_POST['titulo'],
                'descricao' => $_POST['descricao'],
                'data_inicio' => $_POST['data_inicio'],
                'data_fim' => $_POST['data_fim'],
                'localizacao' => $_POST['localizacao'],
                'link' => $_POST['link'],
                'tipo' => $_POST['tipo'],
                'slug' => generateSlug($_POST['titulo'])
            ];

            $result = $this->formacao->criarFormacao($data);

            if ($result) {
                header("Location: /formacoes");
                exit();
            } else {
                echo "Erro ao criar a formação.";
            }
        }
    }
}
