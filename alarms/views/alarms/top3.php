<?php
    $alarms = $alarmController->getTop3();
?>
    <div class="col-auto container mt-5 card bg-white">
        
        <php include('../partials/message.php'); ?>

        <h2 class="mb-4">Top 3 Alarmes mais Atuados</h2>
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Atuações Totais</th>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Equipamento</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Data de Cadastro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alarms as $alarm): ?>
                    <tr>
                        <td><?= $alarm['total_actuations'] ?></td>
                        <td><?= $alarm['id'] ?></td>
                        <td><?= $alarm['name'] ?></td>
                        <td><?= $alarm['equipment_name'] ?></td>
                        <td><?= $alarm['type'] ?></td>
                        <td><?= $alarm['status'] ?></td>
                        <td><?= date('d/m/Y', strtotime($alarm['created_at'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>