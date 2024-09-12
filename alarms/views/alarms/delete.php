<?php

try {
    $alarmController->delete($_GET['id']);
    $_SESSION['message'] = 'Alarme deletado com sucesso.';
} catch (Exception $e) {
    $_SESSION['message'] = 'Erro ao deletar alarme: ' + $e->getMessage();
}

header('Location:index.php?entity=alarm');

