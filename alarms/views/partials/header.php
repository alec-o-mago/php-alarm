<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alarmes</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <div class="container row vh-100">
        <div class="col-auto d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <i class="bi me-2" width="40" height="32"></i>
            <span class="fs-4">Alarmes</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item hover-zoom hover-shadow">
                    <a href="index.php" class="nav-link text-white" aria-current="page">
                        <i class="bi bi-house" width="20"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="index.php?entity=equipment" class="nav-link text-white hover-zoom hover-shadow">
                        <i class="bi bi-tools" width="16" height="16"></i>
                        Equipamentos
                    </a>
                </li>
                <li>
                    <a href="index.php?entity=alarm" class="nav-link text-white hover-zoom hover-shadow">
                        <i class="bi bi-alarm" width="16" height="16"></i>
                        Alarmes
                    </a>
                </li>
                <li>
                    <a href="index.php?entity=alarm&action=top3" class="nav-link text-white hover-zoom hover-shadow">
                        <i class="bi bi-list-ol" width="16" height="16"></i>
                        Top 3 Alarmes
                    </a>
                </li>
                <li>
                    <a href="index.php?entity=alarm_actuation" class="nav-link text-white hover-zoom hover-shadow">
                        <i class="bi bi-bell" width="16" height="16"></i>
                        Atuação de Alarmes
                    </a>
                </li>
            </ul>
            <hr>
        </div>