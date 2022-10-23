<?php
require_once './app/models/task.model.php';
require_once './app/views/task.view.php';
require_once './app/helpers/auth.helper.php';

class TaskController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new TaskView();

        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
    }

    public function showTasks() {
        $tareas = $this->model->getAllTasks();
        $this->view->showTasks($tareas);
    }

    
    function addTask() {
        // TODO: validar entrada de datos

        $title = $_POST['title'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];

        $id = $this->model->insertTask($title, $description, $priority);

        header("Location: " . BASE_URL); 
    }
   
    function deleteTask($id) {
        $this->model->deleteTaskById($id);
        header("Location: " . BASE_URL);
    }

    function finalizeTask($id) {
        $this->model->finalize($id);
        header("Location: " . BASE_URL); 
    }

    
}
