<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $task_id = intval($_POST['task_id']);
    $is_completed = intval($_POST['is_completed']) ;

    //prepare and bind
    $stmt = $conn->prepare("UPDATE todo_list SET is_completed = ? WHERE task_id = ?");
    $stmt->bind_param("ii",$is_completed, $task_id);

    if ($stmt->execute()) {
        echo "Task updated successfully";
    } else {
        echo "Error deleting task: " . $conn->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>