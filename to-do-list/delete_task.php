<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $task_id = intval($_POST['task_id']);

    $sql = "DELETE FROM todo_list WHERE task_id = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $task_id);
    $stmt->execute();

    if ($stmt->execute()) {
        echo "Task deleted successfully";
    } else {
        echo "Error deleting task: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>