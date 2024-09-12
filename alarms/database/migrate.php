<?php
require_once '../config/database.php';

try {
    // Tabela de Equipamentos
    $pdo->exec("CREATE TABLE IF NOT EXISTS equipments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        serial_number VARCHAR(100) NOT NULL, # UNIQUE,
        type ENUM('Tensão', 'Corrente', 'Óleo') NOT NULL, # Usar INT no no lugar de ENUM seria o ideal, mas isso economiza apenas 2 bytes e o ENUM simplifica o código.
        active ENUM('on', 'off') NOT NULL, 
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Tabela de Alarmes
    $pdo->exec("CREATE TABLE IF NOT EXISTS alarms (
        id INT AUTO_INCREMENT PRIMARY KEY,
        equipment_id INT NOT NULL,
        name VARCHAR(100) NOT NULL,
        type ENUM('Urgente', 'Emergente', 'Ordinário') NOT NULL,
        status ENUM('on','off') DEFAULT 'off' NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (equipment_id) REFERENCES equipments(id) ON DELETE CASCADE
    )");

    // Tabela de Atuações de Alarme
    $pdo->exec("CREATE TABLE IF NOT EXISTS alarm_actuations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        alarm_id INT NOT NULL,
        type ENUM('Entrada', 'Saída') NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (alarm_id) REFERENCES alarms(id) ON DELETE CASCADE
    )");

    // Tabela de Logs
    $pdo->exec("CREATE TABLE IF NOT EXISTS logs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user VARCHAR(100) NOT NULL,
        action VARCHAR(100) NOT NULL,
        entity VARCHAR(100) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    // Esse sistema de logs é bem simplificado. Idealmente deveria conter o id do usuário e o id do elemento alterado. Mas esse sistema nem possui usuários.

    echo "Tabelas criadas com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao criar tabelas: " . $e->getMessage();
}
