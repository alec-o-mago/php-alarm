<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alarmes Atuados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Alarmes Atuados</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Data da Entrada</th>
                    <th>Data da Saída</th>
                    <th>Status</th>
                    <th>Descrição do Alarme</th>
                    <th>Descrição do Equipamento</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actuatedAlarms as $alarm): ?>
                    <tr>
                        <td><?= $alarm['data_entrada'] ?></td>
                        <td><?= $alarm['data_saida'] ?></td>
                        <td><?= $alarm['status'] ?></td>
                        <td><?= $alarm['descricao'] ?></td>
                        <td><?= $alarm['equipamento_nome'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
