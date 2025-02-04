<?php

include 'db.php';
$task = htmlspecialchars($_POST['task']);

if (empty($task)) {
    die("Task cannot be empty.");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = trim($_POST['task']);
    //prepare & bind
    $sql = "INSERT INTO todo_list (task, is_completed) VALUES (?, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $task);
    
    if ($stmt->execute()) {
        echo "Task added successfully";
    } else {
        echo "Error adding task: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
