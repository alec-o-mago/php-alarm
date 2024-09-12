<?php
    if(isset($_POST['search_alarm']) && $_POST['name']!='' ) {
        $alarmActuations = $alarmActuationController->search($_POST['name']);
    } else {
        $alarmActuations = $alarmActuationController->index();
    }
?>
    <div class="col-auto container mt-5 card bg-white">
        
        <php include('../partials/message.php'); ?>

        <h2 class="mb-4">Atuação de Alarmes</h2>
        
        <form action="index.php?entity=alarm_actuation" method="POST">
            <div class="d-flex justify-content-between">
                <input type="text" name="name" placeholder="Nome do Alarme..." class="form-control">
                <button type="submit" name="search_alarm" class="btn btn-primary mb-3 text-right">
                    <i class="bi bi-search"></i>&nbsp;&nbsp;Pesquisar
                </button>
            </div>
        </form>
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Alarme</th>
                    <th>Equipamento</th>
                    <th>Tipo</th>
                    <th>Data do Evento</th>
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