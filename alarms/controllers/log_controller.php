<?php
require_once '../config/database.php';

// Esse sistema de logs é bem simplificado. Idealmente deveria conter o id do usuário e o id do elemento alterado.

class LogController {
    
    // Listar todos os Logs
    public function index() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM logs");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Pegar único Log por ID
    public function get($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM logs WHERE id = ?");
        $result = $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Criar um novo Log
    public function store($user, $entity, $action) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO logs (user, entity, action) VALUES (?, ?, ?)");
        return $stmt->execute([$user, $entity, $action]);
    }

    // Atualizar um Log
    public function update($id, $user, $entity, $action) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE logs SET user = ?, entity = ?, action = ?, type = ? WHERE id = ?");
        return $stmt->execute([$user, $entity, $action, $id]);
    }

    // Deletar um Log
    public function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM logs WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

$logController = new LogController();
