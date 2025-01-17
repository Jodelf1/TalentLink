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
    public function create($data)
    {
        // Validação simples para garantir que todos os campos necessários foram preenchidos
        if (empty($data['empresaId']) || empty($data['titulo']) || empty($data['descricao'])) {
            echo "Erro: Todos os campos são obrigatórios!";
            return false;
        }

        try {
            $sql = "INSERT INTO vagas (titulo, descricao, empresa_id, localizacao, data_expiracao, status, categoria_id, ref) 
                    VALUES (:titulo, :descricao, :empresaId, :localizacao, :data_expiracao, :status, :categoria, :ref)";

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

    public function listarVagasPorEmpresa($empresaId){
        try {
            $sql = "SELECT * FROM vagas WHERE empresa_id = :empresa_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':empresa_id', $empresaId);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erro ao listar as vagas por empresa: ' . $e->getMessage();
            return false;
        }
    }

    

    public function findVagaByRef($ref){
        try {
            $sql = "SELECT * FROM vagas WHERE ref = :ref";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':ref', $ref);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        } catch (PDOException $e) {
            echo 'Erro ao listar a vagas por referência ' . $e->getMessage();
            return false;
        }
    }

    
}
