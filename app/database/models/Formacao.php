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

    // Criar perfil de formador
    public function createFormador($formadorId, $nomeFormador, $bio, $especialidades, $localizacao, $contato)
    {
        if (empty($formadorId) || empty($nomeFormador) || empty($bio) || empty($especialidades)) {
            return "Os campos obrigatórios não foram preenchidos.";
        }

        try {
            $sql = "INSERT INTO perfis_formadores (formador_id, nome_formador, bio, especialidades, localizacao, contato)
                    VALUES (:formador_id, :nome_formador, :bio, :especialidades, :localizacao, :contato)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':formador_id', $formadorId);
            $stmt->bindParam(':nome_formador', $nomeFormador);
            $stmt->bindParam(':bio', $bio);
            $stmt->bindParam(':especialidades', $especialidades);
            $stmt->bindParam(':localizacao', $localizacao);
            $stmt->bindParam(':contato', $contato);

            return $stmt->execute();
        } catch (PDOException $e) {
            return "Erro ao criar o perfil: " . $e->getMessage();
        }
    }

    // Obter perfil de formador por ID
    public function getPerfilFormador($formadorId)
    {
        try {
            $sql = "SELECT * FROM perfis_formadores WHERE formador_id = :formador_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':formador_id', $formadorId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Erro ao buscar o perfil: " . $e->getMessage();
        }
    }
}

