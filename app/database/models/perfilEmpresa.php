<?php
namespace app\database\models;

use app\database\Connection;
use PDO;
use PDOException;

class PerfilEmpresa
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connection::connect();
    }

    // Método para criar o perfil da empresa
    public function criarPerfil($empresaId, $nomeEmpresa, $descricao, $localizacao, $site, $telefone)
    {
        // Validação simples para garantir que todos os campos necessários foram preenchidos
        if (empty($empresaId) || empty($nomeEmpresa) || empty($descricao)) {
            echo "Erro: Todos os campos são obrigatórios!";
            return false;
        }

        try {
            $sql = "INSERT INTO perfis_empresas (empresa_id, nome_empresa, descricao, localizacao, site, telefone) 
                    VALUES (:empresa_id, :nome_empresa, :descricao, :localizacao, :site, :telefone)";

            $stmt = $this->pdo->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindParam(':empresa_id', $empresaId);
            $stmt->bindParam(':nome_empresa', $nomeEmpresa);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':localizacao', $localizacao);
            $stmt->bindParam(':site', $site);
            $stmt->bindParam(':telefone', $telefone);

            // Executa a query
            return $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro ao criar o perfil: ' . $e->getMessage();
            return false;
        }
    }

    // Método para obter o perfil da empresa
    public function obterPerfil($empresaId){
        try {
            $sql = "SELECT * FROM perfis_empresas WHERE empresa_id = :empresa_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':empresa_id', $empresaId);
            $stmt->execute();
            
            // Verifica se o perfil foi encontrado
            return $stmt->fetch(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Erro ao obter o perfil: ' . $e->getMessage();
            return false;
        }
    }
}


