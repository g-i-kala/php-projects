<?php

include 'db.php';

$task = htmlspecialchars($_POST['task']);

if (empty($task)) {
    die("Task cannot be empty.");
}

//prepare & bind
$sql = "INSERT INTO todo_list (task, is_completed) VALUES (?, 0)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $task);

if ($stmt->execute()){
    header("Location: index.php");
} else {
    echo "Error adding task: ".$conn->error;
};

$stmt->close();
$conn->close();

?>