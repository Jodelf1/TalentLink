<?php
namespace app\controllers;

class vagaController
{
    public function index()
    {
        controller::view('vaga');
    }

    public function create($data)
    {
        //Função para criar uma nova vaga
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $empresa_id = $_SESSION['user']['id'];
        }


    }

    public function edit($vaga_id, $data)
    {
        //Função para editar uma vaga
    }

    public function delete($vaga_id)
    {
        //Função para deletar uma vaga
    }

    public function listVagas()
    {
        //Função para listar todas as vagas
    }

    public function listVagasByCompany($empresa_id)
    {
        //Função para listar todas as vagas de uma empresa
    }

    public function listVagasByCategory($categoria_id)
    {
        //Função para listar todas as vagas de uma categoria
    }   

    public function listRecommendedVagas($candidato_id)
    {
        //Função para listar vagas recomendadas para um candidato
    }

    public function applyToVaga($vaga_id, $candidato_id)
    {
        //Função para fazer uma candidatura para uma vaga
    }

    public function cancelVagaApplication($vaga_id, $candidato_id)
    {
        //Função para cancelar a candidatura para uma vaga
    }

    public function listVagaApplications($vaga_id)
    {
        //Função para listar todas as candidaturas para uma vaga
    }

    public function listVagaApplicationsByCandidate()
    {
        //Função para listar todas as candidaturas de um candidato
    }

    public function viewVagaDetails($vaga_id)
    {
        //Função para visualizar detalhes de uma vaga
    }

    public function viewApplicationDetails($vaga_id, $candidato_id)
    {
        //Função para visualizar detalhes de uma candidatura
    }

    public function searchVaga($data)
    {
        //Função para buscar vagas
    }

}