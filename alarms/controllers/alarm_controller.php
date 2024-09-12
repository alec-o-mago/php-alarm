<?php
require_once '../config/database.php';
require_once 'log_controller.php';


class AlarmController {
    
    // Listar todos os alarmes
    public function index() {
        global $pdo;
        $stmt = $pdo->query("
            SELECT a.*, e.name as equipment_name
            FROM alarms a
            JOIN equipments e ON a.equipment_id = e.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Pegar único alarme por ID
    public function get($id) {
        global $pdo;
        $stmt = $pdo->prepare("
            SELECT a.*, e.name as equipment_name
            FROM alarms a
            JOIN equipments e ON a.equipment_id = e.id
            WHERE a.id = ?
        ");
        $result = $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Criar um novo alarme
    public function store($name, $type, $equipment_id) {
        global $pdo;
        global $logController;
        $stmt = $pdo->prepare("INSERT INTO alarms (name, type, equipment_id) VALUES (?, ?, ?)");
        $result = $stmt->execute([$name, $type, $equipment_id]);
        if ($result) {
            $logController->store("John Doe", "alarm", "create");
        }
        return $result;
    }

    // Atualizar um alarme
    public function update($id, $name, $type, $equipment_id) {
        global $pdo;
        global $logController;
        $stmt = $pdo->prepare("UPDATE alarms SET name = ?, type = ?, equipment_id = ? WHERE id = ?");
        $result = $stmt->execute([$name, $type, $equipment_id, $id]);
        if ($result) {
            $logController->store("John Doe", "alarm", "edit");
        }
        return $result;
    }

    // Deletar um alarme
    public function delete($id) {
        global $pdo;
        global $logController;
        $stmt = $pdo->prepare("DELETE FROM alarms WHERE id = ?");
        $result = $stmt->execute([$id]);
        if ($result) {
            $logController->store("John Doe", "alarm", "delete");
        }
        return $result;
    }

    // Ativar Alarme
    public function activate($id) {
        global $pdo;
        global $logController;
        $stmt1 = $pdo->prepare("UPDATE alarms SET status = ? WHERE id = ? AND status = 'off'");
        $result1 = $stmt1->execute(['on',$id]);
        if ($stmt1->rowCount() > 0) {
            $stmt2 = $pdo->prepare('INSERT INTO alarm_actuations(alarm_id, type) VALUES (?, ?)');
            $result2 = $stmt2->execute([$id, 'Entrada']);
            $logController->store("John Doe", "alarm", "activate");
        }
        return $result1;
    }

    // Desativar Alarme
    public function deactivate($id) {
        global $pdo;
        global $logController;
        $stmt1 = $pdo->prepare("UPDATE alarms SET status = ? WHERE id = ? AND status = 'on'");
        $result1 = $stmt1->execute(['off',$id]);
        if ($stmt1->rowCount() > 0) {
            $stmt2 = $pdo->prepare('INSERT INTO alarm_actuations(alarm_id, type) VALUES (?, ?)');
            $result2 = $stmt2->execute([$id, 'Saída']);
            $logController->store("John Doe", "alarm", "deactivate");
        }
        return $result1;
    }

    // Obter os 3 alarmes que mais atuaram
    public function getTop3() {
        global $pdo;
        $stmt = $pdo->query("
            SELECT a.*, e.name AS equipment_name, COUNT(aa.alarm_id) AS total_actuations
            FROM alarms a
            JOIN equipments e ON a.equipment_id = e.id
            LEFT JOIN alarm_actuations aa ON a.id = aa.alarm_id AND aa.type = 'Entrada'
            GROUP BY a.id, e.name
            HAVING COUNT(aa.alarm_id) > 0
            ORDER BY total_actuations DESC
            LIMIT 3;
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$alarmController = new AlarmController();
