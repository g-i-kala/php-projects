<?php

include 'db.php';

$task_id = $_POST['task_id'];
$is_completed = isset($_POST['is_completed']) ? 1 :0 ;


//prepare and bind
$stmt = $conn->prepare("UPDATE todo_list SET is_completed = ? WHERE task_id = ?");
$stmt->bind_param("ii",$is_completed, $task_id);

if ($stmt->execute()){
    header("Location: index.php");
} else {
    echo "Error updating task: ".$conn->error;
};

$stmt->close();
$conn->close();

?>