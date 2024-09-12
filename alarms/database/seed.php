<?php
require_once '../controllers/equipment_controller.php';
require_once '../controllers/alarm_controller.php';

$equipmentController = new EquipmentController();
$alarmController = new AlarmController();

try {
    // Equipamentos
    $equipmentController->store("Tensão 1", "A100", "Tensão");
    $equipmentController->store("Tensão 2", "A200", "Tensão");
    $equipmentController->store("Tensão 3", "A300", "Tensão");
    $equipmentController->store("Corrente 1", "B100", "Corrente");
    $equipmentController->store("Corrente 2", "B200", "Corrente");
    $equipmentController->store("Corrente 3", "B300", "Corrente");
    $equipmentController->store("Óleo 1", "C100", "Óleo");
    $equipmentController->store("Óleo 2", "C200", "Óleo");
    $equipmentController->store("Óleo 3", "C300", "Óleo");

    // Alarmes
    $alarmController->store("Tensão Alta","Urgente", 1);
    $alarmController->store("Tensão Baixa","Emergente", 2);
    $alarmController->store("Corrente Alta","Urgente", 4);
    $alarmController->store("Corrente Baixa","Ordinário", 5);
    $alarmController->store("Óleo Alto","Urgente", 7);
    $alarmController->store("Óleo Baixo","Ordinário", 8);

    echo "Tabelas semeadas com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao criar tabelas: " . $e->getMessage();
}
