<?php

namespace app\database\models;

use app\database\Connection;
use PDO;
use PDOException;

class Utilizador
{
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = Connection::connect();
    }

    public function fetch()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM phpauth_users");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Query failed: ' . $e->getMessage();
        }
    }

    public function find($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM phpauth_users WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Query failed: ' . $e->getMessage();
        }
    }

    public function findByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM phpauth_users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function create($data)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO {$this->table} (nome, swrd, permissao_id, email, idh) VALUES (:nome, :swrd, :permissao_id, :email, :idh)");
            return $stmt->execute($data);
        } catch (PDOException $e) {
            echo 'Insert failed: ' . $e->getMessage();
        }
    }

    public function delete($data)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM phpauth_users WHERE id = :id");
            return $stmt->execute($data);
        } catch (PDOException $e) {
            echo 'Insert failed: ' . $e->getMessage();
        }
    }

    public function update($data)
    {
        try {
            $stmt = $this->db->prepare("UPDATE phpauth_users SET email = (:email), password = (:password), permissao_id = (:permissao_id) WHERE id = (:id)");
            return $stmt->execute($data);
        } catch (PDOException $e) {
            echo 'Insert failed: ' . $e->getMessage();
        }
    }

    public function count()
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM phpauth_users");
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}