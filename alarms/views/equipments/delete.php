<?php

try {
    $equipmentController->delete($_GET['id']);
    $_SESSION['message'] = 'Equipamento deletado com sucesso.';
} catch (Exception $e) {
    $_SESSION['message'] = 'Erro ao deletar equipamento: ' + $e->getMessage();
}

header('Location:index.php?entity=equipment');
