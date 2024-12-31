<?php

namespace app\database\models;

use app\database\Connection;
use PHPAuth\Config as PHPAuthConfig;
use PHPAuth\Auth as PHPAuth;
use PDOException;

class cv{
    private $pdo;
    private $auth;

    public function __construct()
    {
        // Conecta ao banco de dados
        $pdo = Connection::connect();
    }

    public function create($data)
    {
        try {
            $sql = 'INSERT INTO cv (nome, email, telefone, endereco, cidade, estado, pais, formacao, experiencia, habilidades, idiomas, interesses) VALUES (:nome, :email, :telefone, :endereco, :cidade, :estado, :pais, :formacao, :experiencia, :habilidades, :idiomas, :interesses)';
            $stmt = $this->pdo->prepare($sql);
            return  $stmt->execute($data);
        } catch (PDOException $e) {
            echo 'Create CV failed: ' . $e->getMessage();
        }
    }

    public function update($data)
    {
        try {
            $sql = 'UPDATE cv SET nome = :nome, email = :email, telefone = :telefone, endereco = :endereco, cidade = :cidade, estado = :estado, pais = :pais, formacao = :formacao, experiencia = :experiencia, habilidades = :habilidades, idiomas = :idiomas, interesses = :interesses WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            echo 'Update CV failed: ' . $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $sql = 'DELETE FROM cv WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            echo 'Delete CV failed: ' . $e->getMessage();
        }
    }

    public function get($id)
    {
        try {
            $sql = 'SELECT * FROM cv WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Get CV failed: ' . $e->getMessage();
        }
    }
}
