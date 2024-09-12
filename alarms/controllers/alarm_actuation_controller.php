<?php
require_once '../config/database.php';
require_once 'log_controller.php';


class AlarmActuationController {
    
    // Listar todas as Atuações de Alarme
    public function index() {
        global $pdo;
        $stmt = $pdo->query("
            SELECT aa.*, a.name as alarm_name, e.name as equipment_name
            FROM alarm_actuations aa
            LEFT JOIN alarms a ON aa.alarm_id = a.id
            LEFT JOIN equipments e ON a.equipment_id = e.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Pegar única Atuação de Alarme por ID
    public function get($id) {
        global $pdo;
        $stmt = $pdo->prepare("
            SELECT aa.*, a.name as alarm_name, e.name as equipment_name
            FROM alarm_actuations aa
            LEFT JOIN alarms a ON aa.alarm_id = a.id
            LEFT JOIN equipments e ON a.equipment_id = e.id
            WHERE aa.id = ?
        ");
        $result = $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Buscar por Nome
    public function search($name) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("
                SELECT aa.*, a.name as alarm_name, e.name as equipment_name
                FROM alarm_actuations aa
                LEFT JOIN alarms a ON aa.alarm_id = a.id
                LEFT JOIN equipments e ON a.equipment_id = e.id
                WHERE a.name LIKE :name
            ");
            $stmt->bindValue( ':name', "%$name%", PDO::PARAM_STR);
            $result = $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    // Criar uma nova Atuação de Alarme
    public function store($alarm_id, $type) {
        global $pdo;
        global $logController;
        $stmt = $pdo->prepare("INSERT INTO alarm_actuations (alarm_id, type) VALUES (?, ?)");
        return $stmt->execute([$alarm_id, $type]);
    }

    // Atualizar uma Atualção de Alarme
    public function update($id, $alarm_id, $type) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE alarm_actuations SET description = ?, classification = ?, equipment_id = ? WHERE id = ?");
        return $stmt->execute([$alarm_id, $type, $id]);
    }

    // Deletar uma Atuação de Alarme
    public function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM alarm_actuations WHERE id = ?");
        return $stmt->execute([$id]);
    }

}

$alarmActuationController = new AlarmActuationController();
