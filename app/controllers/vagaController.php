<?php
namespace app\controllers;
use app\database\models\vaga;
use app\controllers\image;
use app\database\models\imagem;
use app\database\models\candidatura;
use app\database\models\perfilEmpresa;

function formatarData($dataRecebida) {
    $dataAtual = new \DateTime(); // Data atual
    $data = new \DateTime($dataRecebida); // Data recebida
    $diferenca = $dataAtual->diff($data); // Diferença entre as datas

    if ($diferenca->days == 0) {
        return "hoje";
    } elseif ($diferenca->days == 1 && $diferenca->invert == 1) {
        return "ontem";
    } elseif ($diferenca->days == 1 && $diferenca->invert == 0) {
        return "amanhã"; // Caso esteja lidando com datas futuras
    } elseif ($diferenca->days < 30) {
        return "há {$diferenca->days} dias";
    } elseif ($diferenca->m < 12) {
        return "há {$diferenca->m} meses";
    } else {
        $anos = $diferenca->y;
        return $anos === 1 ? "há 1 ano" : "há $anos anos";
    }
}

class vagaController
{

    public function __construct(){
        $this->vaga = new vaga;
        $this->image = new imageController;
        $this->application = new candidatura;
        $this->perfilEmpresa = new perfilEmpresa;
    }

    public function index()
    {
        $vagas = $this->vaga->listarVagas();

        $data = [];

        foreach ($vagas as $vaga) {
            //$categoriaFind = $this->tag->find($vaga['categoria_id']);
            $dataPub = formatarData($vaga['created_at']);
            $pub = [
                    'vaga' => $vaga,
                    'nome_empresa' => $this->perfilEmpresa->obterPerfil($vaga['empresa_id'])['nome_empresa'],
                    'data' => $dataPub,//'categoria' => $categoriaFind,
                    'img_empresa' => $this->image->getImage($vaga['id'], "vaga_referencia_id")->path,
                    'n_candidaturas' => $this->application->countByVagaId($vaga['id'])
                ];
                array_push($data, $pub);
        }

        controller::view('vaga', ['vagas' => $data]);
    }

    public function create($data)
    {
        //Função para criar uma nova vaga

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
            $localizacao = filter_input(INPUT_POST, 'localizacao', FILTER_SANITIZE_STRING);
            $empresaId = $_SESSION['user']['id'];
            $dataExpiracao = $_POST['data_expiracao'];
       
            $data = [
                'titulo' => $titulo,
                'descricao' => $descricao,
                'empresaId' => $empresaId,
                'localizacao' => $localizacao,
                'data_expiracao' => $dataExpiracao,
                'status' => 1,
                'categoria' => 1,
                'ref' => hash('sha256', $titulo . $empresaId . date("Ymd"))
            ];

            
            if($this->vaga->create($data)){
                $dataImg = [
                    'imagem' => $_FILES['foto_capa'],
                    'tipo_referencia' => "vaga",
                    'vaga_referencia_id' => $this->vaga->findVagaByRef($data['ref'])['id'],
                    'tabela' => "vaga_referencia_id"
                ];
                $this->image->create($dataImg);
                $destino = "/c/vagas";

                echo json_encode([
                    'success' => true,
                    'destino' => $destino,
                    'message' => "Vaga Publicada! Redirecionando."
                ]);  

            }else{
                echo json_encode([
                    'success' => false,
                    'message' => "Houve um erro, tente novamente."
                ]); 
            }
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
        $vagas = $this->vaga->listarVagas();

        $data = [];

        foreach ($vagas as $vaga) {
            //$categoriaFind = $this->tag->find($vaga['categoria_id']);
            $dataPub = formatarData($vaga['created_at']);
            $pub = [
                    'vaga' => $vaga,
                    'nome_empresa' => $this->perfilEmpresa->obterPerfil($vaga['empresa_id'])['nome_empresa'],
                    'data' => $dataPub,
                    //'categoria' => $categoriaFind,
                    'img_empresa' => $this->image->getImage($vaga['id'], "vaga_referencia_id")->path,
                    'n_candidaturas' => $this->application->countByVagaId($vaga['id'])
                ];
                array_push($data, $pub);
        }

        return $data;
    }

    public function listVagasByCompany()
    {
        //Função para listar todas as vagas de uma empresa
        $vagas = $this->vaga->listarVagasPorEmpresa($_SESSION['user']['id']);

        $data = [];

        foreach ($vagas as $vaga) {
            //$categoriaFind = $this->tag->find($vaga['categoria_id']);
            $pub = [
                    'vaga' => $vaga,
                    //'categoria' => $categoriaFind,
                    'img' => $this->image->getImage($vaga['id'], "vaga_referencia_id")->path,
                    'n_candidaturas' => $this->application->countByVagaId($vaga['id'])
                ];
                array_push($data, $pub);
        }
        
        controller::view('empresa/vagas', ['vagas' => array_reverse($data)]);
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

    public function viewVagaDetails($params)
    {
        $vagaId = $params['id'];
        // Obtém o perfil da empresa
        $vaga = $this->vaga->obterVaga($vagaId);
        // Se o perfil não existir, redireciona para uma página de erro ou lista de empresas
        if ($vaga) {

            $pub = [
                'vaga' => $vaga,
                'nome_empresa' => $this->perfilEmpresa->obterPerfil($vaga['empresa_id'])['nome_empresa'],
                //'categoria' => $categoriaFind,
                'img' => $this->image->getImage($vaga['id'], "vaga_referencia_id")->path,
                'n_candidaturas' => $this->application->countByVagaId($vaga['id'])
            ];

            return controller::view("vagaDetails", ['vaga' => $pub]); 
        }else{
            return controller::view('errors/404');
        }
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