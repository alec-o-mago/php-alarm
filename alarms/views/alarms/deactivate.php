<?php

try {
    $alarmController->deactivate($_GET['id']);
    $_SESSION['message'] = 'Alarme desativado com sucesso.';
} catch (Exception $e) {
    $_SESSION['message'] = 'Erro ao desativar alarme: ' + $e->getMessage();
}

header('Location:index.php?entity=alarm');
