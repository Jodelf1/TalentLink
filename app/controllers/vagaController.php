<?php
namespace app\controllers;
use app\database\models\vaga;

class vagaController
{

    public function __construct(){
        $this->vaga = new vaga;
    }
    public function index()
    {

        controller::view('vaga');
    }

    public function create($data)
    {
        //Função para criar uma nova vaga

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
            $localizacao = filter_input(INPUT_POST, 'localizacao', FILTER_SANITIZE_STRING);
            $salarioMin = $_POST['salario_minimo'];
            $salarioMax = $_POST['salario_maximo'];
            $empresaId = $_SESSION['user']['id'];
            $dataExpiracao = $_POST['data_expiracao'];

            $data = [
                'titulo' => $titulo,
                'descricao' => $descricao,
                'empresaId' => $empresaId,
                'localizacao' => $localizacao,
                'salario_min' => $salarioMin,
                //'salarioMax' => $salarioMax,
                'data_expiracao' => $dataExpiracao,
                'status' => 1,
                'categoria' => 1
            ];

            

            $this->vaga->create($data);

        }else{
            controller::view('empresa/createVaga');
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

    public function listVagasByCompany()
    {
        //Função para listar todas as vagas de uma empresa
        $vagas = $this->vaga->listarVagasPorEmpresa($_SESSION['user']['id']);
        
        controller::view('empresa/vagas', ['vagas' => $vagas]);
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