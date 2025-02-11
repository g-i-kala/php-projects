<?php
require_once __DIR__."/../../config/database.php";

class Task {
    private $conn;
    private $table = "todo_list";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getTasks() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTask($task) {
        $query = "INSERT INTO " . $this->table . " (task) VALUES (:task)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":task", $task);
        return $stmt->execute();
    }

    public function deleteTask($task_id) {
        $query = "DELETE FROM ". $this->table . " WHERE task_id = :task_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":task_id", $task_id);
        return $stmt->execute();
    }

    public function updateTask($task_id, $is_completed) {
        $query = "UPDATE " . $this->table ." SET is_completed = :is_completed WHERE task_id = :task_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":is_completed", $is_completed, PDO::PARAM_INT);
        $stmt->bindParam(":task_id", $task_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>