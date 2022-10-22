<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class TaskView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showTasks($tasks) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($tasks)); 
        $this->smarty->assign('tasks', $tasks);

        // mostrar el tpl
        $this->smarty->display('taskList.tpl');
    }
}