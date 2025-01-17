<?php

namespace app\database\models;

use app\database\Connection;
use PDO;
use PDOException;

class Imagem
{
    private $table = 'imagens';
    private $db;

    public function __construct()
    {
        $this->db = Connection::connect();
    }

    public function create($data, $tabela)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO {$this->table} ({$tabela}, tipo_referencia, path) VALUES (:{$tabela}, :tipo_referencia, :path)");
            return $stmt->execute($data);
        } catch (PDOException $e) {
            echo 'Falha na inserção da imagem: ' . $e->getMessage();
        }
    }

    public function update($data)
    {
        try {
            $stmt = $this->db->prepare("UPDATE {$this->table} SET url = :url WHERE  {$refType} = :id");
            return $stmt->execute($data);
        } catch (PDOException $e) {
            echo 'Insert failed: ' . $e->getMessage();
        }
    }

    public function find($id, $refType)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$refType} = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Query failed: ' . $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE {$refType} = :id");
            return $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            echo 'Insert failed: ' . $e->getMessage();
        }

    }

}