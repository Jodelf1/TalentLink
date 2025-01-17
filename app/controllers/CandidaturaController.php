<?php

namespace app\controllers;

use app\database\models\Candidatura;
use app\database\models\Auth;

class candidaturaController
{
    private $candidatura;
    private $auth;

    public function __construct()
    {
        $this->candidatura = new Candidatura();
        $this->auth = new Auth();
    }


    public function create($params)
    {
        if (!$this->auth->isLogged()) {
            header("Location: /login");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vagaId = $params['id'];

            $candidatoId = $_SESSION['user']['id'];

            if ($this->candidatura->createCandidatura($vagaId, $candidatoId)) {
                header("Location: /candidaturas");
                exit();
            } else {
                echo "Erro ao criar candidatura.";
            }
        }
    }

    
    public function listByCandidato()
    {
        if (!$this->auth->isLogged()) {
            header("Location: /login");
            exit();
        }

        $candidatoId = $_SESSION['user']['id'];
        $candidaturas = $this->candidatura->listCandidaturasByCandidato($candidatoId);

        Controller::view('candidaturas/list', ['candidaturas' => $candidaturas]);
    }

    
    public function updateStatus($params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $params['id'];
            $status = $_POST['status'];

            if ($this->candidatura->updateCandidaturaStatus($id, $status)) {
                header("Location: /admin/candidaturas");
                exit();
            } else {
                echo "Erro ao atualizar status.";
            }
        }
    }

    
    public function delete($params)
    {
        $id = $params['id'];

        if ($this->candidatura->deleteCandidatura($id)) {
            header("Location: /candidaturas");
            exit();
        } else {
            echo "Erro ao excluir candidatura.";
        }
    }
}
