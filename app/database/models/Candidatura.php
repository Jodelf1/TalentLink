<?php

namespace app\database\models;

use app\database\Connection;
use PDO;
use PDOException;

class Candidatura
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connection::connect();
    }

    
    public function createCandidatura($vagaId, $candidatoId)
    {
        try {
            $sql = "INSERT INTO candidaturas (vaga_id, candidato_id) VALUES (:vaga_id, :candidato_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':vaga_id', $vagaId);
            $stmt->bindParam(':candidato_id', $candidatoId);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao criar candidatura: " . $e->getMessage();
            return false;
        }
    }

    
    public function updateCandidaturaStatus($id, $status)
    {
        try {
            $sql = "UPDATE candidaturas SET status = :status WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao atualizar candidatura: " . $e->getMessage();
            return false;
        }
    }

    
    public function listCandidaturasByCandidato($candidatoId)
    {
        try {
            $sql = "SELECT c.*, v.titulo FROM candidaturas c
                    JOIN vagas v ON c.vaga_id = v.id
                    WHERE c.candidato_id = :candidato_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':candidato_id', $candidatoId);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar candidaturas: " . $e->getMessage();
            return [];
        }
    }

    
    public function deleteCandidatura($id)
    {
        try {
            $sql = "DELETE FROM candidaturas WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao excluir candidatura: " . $e->getMessage();
            return false;
        }
    }
}
