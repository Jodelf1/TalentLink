<?php

namespace app\database\models;

use app\database\Connection;
use PDO;
use PDOException;

class candidatura
{
    private $table = 'candidaturas';
    private $db;

    public function __construct()
    {
        $this->db = Connection::connect();
    }

    // FAZER FUNÇÃO PARA CONTAR NÚMERO DE CANDIDATURAS

    public function countByVagaId($vaga_id)
    {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM {$this->table} WHERE vaga_id = :vaga_id");
            $stmt->bindParam(':vaga_id', $vaga_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (PDOException $e) {
            // Tratar erro de conexão ou consulta
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public function createCandidatura($vagaId, $candidatoId){
        try {
            $stmt = $this->db->prepare("INSERT INTO {$this->table} (vaga_id, candidato_id) VALUES (:vaga_id, :candidato_id)");
            $stmt->bindParam(':vaga_id', $vagaId);
            $stmt->bindParam(':candidato_id', $candidatoId);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo 'Falha na inserção da imagem: ' . $e->getMessage();
        }
    }
}