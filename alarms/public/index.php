<?php
require_once '../controllers/equipment_controller.php';
require_once '../controllers/alarm_controller.php';
require_once '../controllers/alarm_actuation_controller.php';

$action = $_GET['action'] ?? '';
$entity = $_GET['entity'] ?? '';

$_SESSION['message'] = 'TESTE MENSAGEM!!1';

include '../views/partials/header.php';
// include '../views/partials/message.php';


switch ($entity) {
    case 'equipment':
        switch ($action) {
            case 'create':
                include '../views/equipments/create.php';
                break;
        
            case 'edit':
                include '../views/equipments/edit.php';
                break;
            
            case 'delete':
                include '../views/equipments/delete.php';
                break;

            default:
                include '../views/equipments/index.php';
                break;
        }
        break;

    case 'alarm':
        switch ($action) {
            case 'create':
                include '../views/alarms/create.php';
                break;
        
            case 'edit':
                include '../views/alarms/edit.php';
                break;
        
            case 'delete':
                include '../views/alarms/delete.php';
                break;
        
            case 'activate':
                include '../views/alarms/activate.php';
                break;
            
            case 'deactivate':
                include '../views/alarms/deactivate.php';
                break;

            case 'top3':
                include '../views/alarms/top3.php';
                break;
        
            default:
                include '../views/alarms/index.php';
        }
        break;

    case 'alarm_actuation':
        include '../views/alarm_actuations/index.php';
        break;

    default:
        include '../views/home.php';
}

include '../views/partials/footer.php';
