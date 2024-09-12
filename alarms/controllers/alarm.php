<?php
require_once '../config/database.php';

class AlarmController {
    
    // Listar todos os alarmes
    public function index() {
        global $pdo;
        $stmt = $pdo->query("
            SELECT a.*, e.name as equipment_name
            FROM alarms a
            JOIN equipaments e ON a.equipment_id = e.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Criar um novo alarme
    public function store($description, $classification, $equipment_id) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO alarms (description, classification, equipment_id) VALUES (?, ?, ?)");
        return $stmt->execute([$description, $classification, $equipment_id]);
    }

    // Atualizar um alarme
    public function update($id, $description, $classification, $equipment_id) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE alarms SET description = ?, classification = ?, equipment_id = ? WHERE id = ?");
        return $stmt->execute([$description, $classification, $equipment_id, $id]);
    }

    // Deletar um alarme
    public function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM alarms WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Verificar alarmes atuados
    public function getActuatedAlarms() {
        global $pdo;
        $stmt = $pdo->query("
            SELECT a.*, e.name as equipment_name
            FROM alarms a
            JOIN equipments e ON a.equipment_id = e.id
            WHERE a.status = 'Atuado'
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obter os 3 alarmes que mais atuaram
    public function getTop3ActuatedAlarms() {
        global $pdo;
        $stmt = $pdo->query("
            SELECT a.description, COUNT(*) as total_actuations
            FROM alarms a
            JOIN equipments e ON a.equipment_id = e.id
            GROUP BY a.description
            ORDER BY total_actuations DESC
            LIMIT 3
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$controller = new AlarmController();
