<?php
require_once __DIR__ . "/../models/Task.php";

class TaskController {
    private $taskModel;

    public function __construct() {
        $this->taskModel = new Task();
    }

    public function index() {
        require __DIR__ . "/../views/index.php";
    }

    public function fetchTasks() {
        $tasks = $this->taskModel->getTasks();
        echo json_encode($tasks);
    }

    public function addTask() {
        // echo "addTask method triggered!";
        // echo $_POST['task'];
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['task'])) {
            $this->taskModel->addTask($_POST['task']);
        }
    }

    public function deleteTask() {
        echo "delete Task method triggered!";
        echo $_POST['task_id'];
        if ($_SERVER["REQUEST_METHOD"]==="POST" && !empty($_POST['task_id'])) {
            $this->taskModel->deleteTask($_POST['task_id']);
        }
    }

    public function updateTask() {
        echo "updateTask method triggered!";
        if (isset($_POST['task_id']) && isset($_POST['is_completed'])) {
            $task_id = intval($_POST['task_id']);
            $is_completed = intval($_POST['is_completed']);
            $this->taskModel->updateTask($task_id, $is_completed);
        }
        header("Location: /");
    }
}