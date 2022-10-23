<?php
require_once './app/controllers/task.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'list'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// tabla de ruteo
switch ($params[0]) {
    case 'login':
        $authController = new AuthController();
        $authController->showFormLogin();
        break;
    case 'validate':
        $authController = new AuthController();
        $authController->validateUser();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    case 'list':
        $taskController = new TaskController();
        $taskController->showTasks();
        break;
    case 'add':
        $taskController = new TaskController();
        $taskController->addTask();
        break;
    case 'delete':
        $taskController = new TaskController();
        // obtengo el parametro de la acción
        $id = $params[1];
        $taskController->deleteTask($id);
        break;
    case "finalize":  // finalize/:ID
        $taskController = new TaskController();
        $id = $params[1];
        $taskController->finalizeTask($id);
        break;
    default:
        echo('404 Page not found');
        break;
}
