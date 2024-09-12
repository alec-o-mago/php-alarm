<?php
    $equipments = $equipmentController->index();
?>
    <div class="col-auto container mt-5 card bg-white">
        
        <php include('../partials/message.php'); ?>

        <h2 class="mb-4">Equipamentos</h2>
        
        <div class="d-flex justify-content-end"><a href="index.php?entity=equipment&action=create" class="btn btn-primary mb-3 text-right">
            <i class="bi bi-plus-lg"></i>&nbsp;Criar Novo Equipamento
        </a></div>
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Número de Série</th>
                    <th>Tipo</th>
                    <th>Data de Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipments as $equipment): ?>
                    <tr>
                        <td><?= $equipment['id'] ?></td>
                        <td><?= $equipment['name'] ?></td>
                        <td><?= $equipment['serial_number'] ?></td>
                        <td><?= $equipment['type'] ?></td>
                        <td><?= date('d/m/Y', strtotime($equipment['created_at'])) ?></td>
                        <td>
                            <a href="index.php?entity=equipment&action=edit&id=<?= $equipment['id'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i>&nbsp;&nbsp;Editar</a>
                            <a onclick="return confirm('Tem certeza que deseja excluir?')" href="index.php?entity=equipment&action=delete&id=<?= $equipment['id'] ?>" class="btn btn-sm btn-danger"> <i class="bi-trash3-fill"></i>&nbsp;&nbsp;Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>