<?php
require_once '../config/database.php';
require_once 'log_controller.php';


class EquipmentController {
    
    // Listar todos os equipamentos
    public function index() {
        global $pdo;
        
        $stmt = $pdo->query("SELECT * FROM equipments");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Pegar único equipamento por ID
    public function get($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM equipments WHERE id = ?");
        $result = $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Criar um novo equipamento
    public function store($name, $serial_number, $type) {
        global $pdo;
        global $logController;
        $stmt = $pdo->prepare("INSERT INTO equipments (name, serial_number, type) VALUES (?, ?, ?)");
        $result = $stmt->execute([$name, $serial_number, $type]);
        if ($result) {
            $logController->store("John Doe", "equipment", "create");
        }
        return $result;
    }

    // Atualizar um equipamento
    public function update($id, $nome, $serial_number, $type) {
        global $pdo;
        global $logController;
        $stmt = $pdo->prepare("UPDATE equipments SET name = ?, serial_number = ?, type = ? WHERE id = ?");
        $result =  $stmt->execute([$nome, $serial_number, $type, $id]);
        if ($result) {
            $logController->store("John Doe", "equipment", "update");
        }
        return $result;
    }

    // Deletar um equipamento
    public function delete($id) {
        global $pdo;
        global $logController;
        $stmt = $pdo->prepare("DELETE FROM equipments WHERE id = ?");
        $result = $stmt->execute([$id]);
        if ($result) {
            $logController->store("John Doe", "equipment", "delete");
        }
        return $result;
    }
}

$equipmentController = new EquipmentController();