<?php

namespace app\controllers;

use app\database\models\CriarFormacao;
use app\database\models\Auth;

class CriarFormacaoController
{
    private $formacaoModel;
    private $auth;

    public function __construct()
    {
        $this->formacaoModel = new CriarFormacao();
        $this->auth = new Auth();
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
            $formadorId = $_SESSION['user']['id'];
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $dataInicio = $_POST['data_inicio'];
            $dataFim = $_POST['data_fim'];
            $localizacao = $_POST['localizacao'];
            $link = $_POST['link'];

            $result = $this->formacaoModel->criarFormacao($formadorId, $titulo, $descricao, $dataInicio, $dataFim, $localizacao, $link);

            if ($result) {
                header("Location: /formacoes");
                exit();
            } else {
                echo "Erro ao criar a formação.";
            }
        }
    }

    // Exibir a lista de formações
    public function listarFormacoes()
    {
        $formacoes = $this->formacaoModel->listarFormacoes();
        Controller::view("Formacao/ListarFormacao", ['formacoes' => $formacoes]);
    }
}
