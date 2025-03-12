<?php

namespace app\database\models;

use app\database\Connection;
use PDO;
use PDOException;

class Formacao
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connection::connect();
    }

    // Método para criar uma formação
    public function criarFormacao($data)
    {
       /* if (empty($formadorId) || empty($titulo) || empty($descricao) || empty($dataInicio) || empty($dataFim) || empty($localizacao)) {
            echo "Todos os campos obrigatórios devem ser preenchidos.";
            return false;
        }*/

        try {
            $sql = "INSERT INTO webinars_formacoes (formador_id, titulo, descricao, data_inicio, data_fim, localizacao, link)
                    VALUES (:formador_id, :titulo, :descricao, :data_inicio, :data_fim, :localizacao, :link)";
            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute($data);
            
        } catch (PDOException $e) {
            echo "Erro ao criar a formação: " . $e->getMessage();
            return false;
        }
    }

    // Método para listar formações
    public function listarFormacoes()
    {
        try {
            $sql = "SELECT * FROM webinars_formacoes ORDER BY data_inicio DESC";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar formações: " . $e->getMessage();
            return false;
        }
    }
}
