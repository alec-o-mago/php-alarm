<?php
require_once '../config/database.php';

class EquipmentController {
    
    // Listar todos os equipamentos
    public function index() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM equipments");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Criar um novo equipamento
    public function store($name, $serial_number, $type) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO equipments (name, serial_number, type) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $serial_number, $type]);
    }

    // Atualizar um equipamento
    public function update($id, $nome, $serial_number, $type) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE equipments SET name = ?, serial_number = ?, type = ? WHERE id = ?");
        return $stmt->execute([$nome, $serial_number, $type, $id]);
    }

    // Deletar um equipamento
    public function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM equipments WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

$controller = new EquipmentController();
