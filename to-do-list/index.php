<?php

use Dom\HTMLElement;

include 'db.php';

//fetch tasks and display
$sql = "SELECT * FROM todo_list"; //zapytanie o wszystkie dane z tabeli todo_list
$result = $conn->query($sql); //wynik obiekt $conn posiada juz te wyniki

$table_data = [];

if ($result->num_rows > 0) {
    while ($row = $result -> fetch_assoc()){
        $table_data[] = $row;
      //  echo "Task: ".$row['task']."<br>";
    };
} else {
    echo "No tasks found.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css"?v=1.1>
    <title>Todo List</title>
    <div class="page__container">
        <h1>ToDo List</h1>
            <div class="table__wrapper">
            <table class="table__style" border="1">
                <tr>
                    <th>Task ID</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                <?php 
                    $row_count = 1;
                    foreach ($table_data as $row): ?>
                    <tr class="table__row">
                        <td class="table__column"><?php echo $row_count?></td>
                        <td class="table__column table__column--task"><?php echo htmlspecialchars($row['task'])?></td>
                        <td class="table__column">
                            <!-- show status with checkbox -->
                            <form action="update_task.php" method="POST" name="status">
                                <input type="hidden" name="task_id" value="<?php echo $row['task_id'] ?>">
                                <input type="checkbox" name="is_completed" value="1"
                                    <?php echo $row['is_completed'] ? 'checked' : '';?>
                                    onchange="this.form.submit()">  
                            </form>
                        </td>
                        <td class="table__column">
                            <!-- delete task handling -->
                            <form action="delete_task.php" method="POST" name="delete_task" >
                                <input type="hidden" name="task_id" value="<?php echo $row['task_id'] ?>" class="input__field">
                                <button class="btn" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr> 
                <?php 
                    $row_count+=1;
                    endforeach; ?>
            </table>
            <div class="form__add__wrapper">
                 <!-- add task handling -->
                <form action="add_task.php" method="POST" id="add_task" class="form__add">
                    <label for="task" class="input__field--label">Task</label>
                    <input type="text" id="task" name="task" class="input__field" required>
                    <button class="btn" type="submit">Add task</button>
                </form>
            </div>
    </div>
    </div>
</head>
<body>
    
</body>
</html>