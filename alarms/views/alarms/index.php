<?php
    $alarms = $alarmController->index();
?>
    <div class="col-auto container mt-5 card bg-white">
        
        <php include('../partials/message.php'); ?>

        <h2 class="mb-4">Alarmes</h2>
        
        <div class="d-flex justify-content-end"><a href="index.php?entity=alarm&action=create" class="btn btn-primary mb-3 text-right">
            <i class="bi bi-plus-lg"></i>&nbsp;Criar Novo Alarme
        </a></div>
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Equipamento</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Data de Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alarms as $alarm): ?>
                    <tr>
                        <td><?= $alarm['id'] ?></td>
                        <td><?= $alarm['name'] ?></td>
                        <td><?= $alarm['equipment_name'] ?></td>
                        <td><?= $alarm['type'] ?></td>
                        <td><?= $alarm['status'] ?></td>
                        <td><?= date('d/m/Y', strtotime($alarm['created_at'])) ?></td>
                        <td>
                            <?php if ($alarm['status']=='off'): ?>
                                <a href="index.php?entity=alarm&action=activate&id=<?= $alarm['id'] ?>" class="btn btn-sm btn-success"><i class="bi bi-bell"></i>&nbsp;&nbsp;Ativar</a>
                            <?php else: ?>
                                <a href="index.php?entity=alarm&action=deactivate&id=<?= $alarm['id'] ?>" class="btn btn-sm btn-info"><i class="bi bi-bell-slash"></i>&nbsp;&nbsp;Desativar</a>
                            <?php endif; ?>
                            <a href="index.php?entity=alarm&action=edit&id=<?= $alarm['id'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i>&nbsp;&nbsp;Editar</a>
                            <a onclick="return confirm('Tem certeza que deseja excluir?')" href="index.php?entity=alarm&action=delete&id=<?= $alarm['id'] ?>" class="btn btn-sm btn-danger"> <i class="bi-trash3-fill"></i>&nbsp;&nbsp;Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>