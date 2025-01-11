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

    public function create($data)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO {$this->table} (noticia_id, url) VALUES (:noticia_id, :url)");
            return $stmt->execute($data);
        } catch (PDOException $e) {
            echo 'Insert failed: ' . $e->getMessage();
        }
    }

    public function update($data)
    {
        try {
            $stmt = $this->db->prepare("UPDATE {$this->table} SET url = :url WHERE noticia_id = :noticia_id");
            return $stmt->execute($data);
        } catch (PDOException $e) {
            echo 'Insert failed: ' . $e->getMessage();
        }
    }

    public function find($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE noticia_id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Query failed: ' . $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE noticia_id = :id");
            return $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            echo 'Insert failed: ' . $e->getMessage();
        }

    }

}