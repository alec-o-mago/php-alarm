<?php
    //Resultados via botão "Pesquisar"
    if(isset($_POST['search_alarm']) && $_POST['name']!='' ) {
        $alarmActuations = $alarmActuationController->searchByName($_POST['name']);
    // Resultados via ordenação de Colunas
    } elseif (isset($_GET['orderby'])) {
        $alarmActuations = $alarmActuationController->searchByOrder($_GET['orderby']);
    // Resultado Padrão
    } else {
        $alarmActuations = $alarmActuationController->index();
    }
?>
    <div class="col-auto container mt-5 card bg-white">
        
        <php include('../partials/message.php'); ?>

        <h2 class="mb-4">Atuação de Alarmes</h2>
        
        <form action="index.php?entity=alarm_actuation" method="POST">
            <div class="d-flex justify-content-between mt-1 w-100">
                <div class="p-1 flex-fill">
                    <input type="text" name="name" placeholder="Nome do Alarme..." class="form-control w-100">
                </div>
                <div class="p-1">
                    <button type="submit" name="search_alarm" class="btn btn-primary mb-3 text-right">
                    <i class="bi bi-search"></i>&nbsp;&nbsp;Pesquisar
                </button>
                </div>
                
            </div>
        </form>
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th><a href="index.php?entity=alarm_actuation&orderby=id">ID</a></th>
                    <th><a href="index.php?entity=alarm_actuation&orderby=alarm_name">Alarme</a></th>
                    <th><a href="index.php?entity=alarm_actuation&orderby=equipment_name">Equipamento</a></th>
                    <th><a href="index.php?entity=alarm_actuation&orderby=type">Tipo</a></th>
                    <th><a href="index.php?entity=alarm_actuation&orderby=create_at">Data do Evento</a></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alarmActuations as $alarmActuation): ?>
                    <tr>
                        <td><?= $alarmActuation['id'] ?></td>
                        <td><?= $alarmActuation['alarm_name'] ?></td>
                        <td><?= $alarmActuation['equipment_name'] ?></td>
                        <td><?= $alarmActuation['type'] ?></td>
                        <td><?= date('d/m/Y', strtotime($alarmActuation['created_at'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>