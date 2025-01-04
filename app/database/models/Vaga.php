<?php
namespace app\database\models;

use app\database\Connection;
use PDO;
use PDOException;

class Vaga{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connection::connect();
    }

    // Método para criar uma nova vaga
    public function criarVaga($data)
    {
        // Validação simples para garantir que todos os campos necessários foram preenchidos
        if (empty($data['empresaId']) || empty($data['titulo']) || empty($data['descricao'])) {
            echo "Erro: Todos os campos são obrigatórios!";
            return false;
        }

        try {
            $sql = "INSERT INTO vagas (empresa_id, titulo, descricao, localizacao, tipo_contrato, salario) 
                    VALUES (:empresa_id, :titulo, :descricao, :localizacao, :tipo_contrato, :salario)";

            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            echo 'Erro ao criar a vaga: ' . $e->getMessage();
            return false;
        }
    }

    // Método para obter uma vaga
    public function obterVaga($vagaId){
        try {
            $sql = "SELECT * FROM vagas WHERE id = :vaga_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':vaga_id', $vagaId);
            $stmt->execute();
            
            // Verifica se a vaga foi encontrada
            return $stmt->fetch(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Erro ao obter a vaga: ' . $e->getMessage();
            return false;
        }
    }

    // Método para listar todas as vagas
    public function listarVagas(){
        try {
            $sql = "SELECT * FROM vagas";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erro ao listar as vagas: ' . $e->getMessage();
            return false;
        }
    }

    // Método para listar vagas por categoria
    public function listarVagasPorCategoria($categoria){
        try {
            $sql = "SELECT * FROM vagas WHERE categoria = :categoria";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erro ao listar as vagas por categoria: ' . $e->getMessage();
            return false;
        }
    }

    
}
