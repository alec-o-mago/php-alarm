<?php

try {
    $alarmController->activate($_GET['id']);
    $_SESSION['message'] = 'Alarme ativado com sucesso.';
} catch (Exception $e) {
    $_SESSION['message'] = 'Erro ao ativar alarme: ' + $e->getMessage();
}

header('Location:index.php?entity=alarm');
