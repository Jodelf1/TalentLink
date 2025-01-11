<?php

namespace app\Controllers;
use app\database\models\imagem;

class imageController{

    public function __construct(){
        $this->image = new imagem(); 
    }

    public function create($data){
        $arquivo = $data['imagem'];
        $arquivoNovo = explode('.', $arquivo['name']);
        $extensao = strtolower(end($arquivoNovo));

        if ($extensao != "jpg" && $extensao != "jpeg" && $extensao != "png") {
            $msg = 'Formato inválido. Converta para jpg, png ou jpeg';
        } else {
            $nome = hash('sha256', bin2hex(random_bytes(16)) . $arquivo['name']) . '.' . $extensao;
            $destino = 'upload/' . $nome;

            // Ajustando as barras para o padrão correto
            $caminhoCompleto = dirname(__DIR__, 2) . '/public/assets/img/' . $destino;

            if (move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
                            // echo $caminhoCompleto;
                $msg = 'Imagem Carregada Com Sucesso';
            } else {
                $msg = 'Erro ao mover o arquivo.';
            }

            $dataImg = [
                'path' => '/assets/img/upload/' . $nome,
                'tipo_referecia' => $data['referencia'],
                'referencia_id' => $data['referencia_id']
            ];

            $this->image->create($dataImg);
        }

    }
}