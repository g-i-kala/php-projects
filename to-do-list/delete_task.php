<?php

include 'db.php';

$task_id = $_POST['task_id'];

if (!$task_id) {
    die("Task ID not provided.");
}

$sql = "DELETE FROM todo_list WHERE task_id = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $task_id);


if ($stmt->execute()){
    header("Location: index.php");
} else {
    echo "Error deleting task: ".$conn->error;
}

$stmt->close();
$conn->close();

?>