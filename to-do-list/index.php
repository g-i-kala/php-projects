<?php

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Todo List</title>

</head>
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
                <tbody id='task_table'>
                    
                    <!-- dynamic table here -->
                </tbody>
            </table>
            <div class="form__add__wrapper">
                 <!-- add task handling -->
                <form id="add_task_form" class="form__add">
                    <label for="task" class="input__field--label">Task</label>
                    <input type="text" id="task" name="task" class="input__field" required>
                    <button class="btn" type="submit">Add task</button>
                </form>
            </div>
            
        <script>
             $(document).ready(function(){
                //fetch tasks
                function fetch_tasks(){
                    $.ajax({
                        url: 'fetch_tasks.php',
                        type: 'GET',
                        success: function(response){
                            $('#task_table').html(response);
                        },
                        error: function(error){
                            console.error("Error loading tasks:", error);
                        }
                    });
                }
                fetch_tasks();

                //add task
                $('#add_task_form').submit(function(e){
                    e.preventDefault();
                    let task_value = $('#task').val();
                    $.ajax({
                        url: 'add_task.php',
                        type: 'POST',
                        data: {task: task_value},
                        success: function(response){
                            fetch_tasks();
                            $('#task').val('');
                        },
                        error: function(error){
                            console.error("Error adding task:", error);
                        }
                    });
                });

                //update task
                $(document).on('change', '.task-checkbox', function(){
                    let task_id = $(this).data('id');
                    let is_completed = $(this).is(':checked') ? 1 : 0;

                    $.ajax({
                        url: 'update_task.php',
                        type: 'POST',
                        data: {task_id: task_id, is_completed: is_completed},
                        success: function(response){
                            fetch_tasks();
                        },
                        error: function(xhr, status, error){
                            console.error("Error updating task:", error);
                        }
                    })
                });

                //delete task
                $(document).on('click', '.delete-btn', function(){
                    let task_id = $(this).data('id');

                    $.ajax({
                        url: 'delete_task.php',
                        type: 'POST',
                        data: {task_id: task_id},
                        success: function(response){
                            fetch_tasks();
                        }, 
                        error: function(error){
                            console.error("Error deleting task:", error);
                        }
                    })
                })
             });
        </script>

    </div>
    </div>

<body>
    
</body>
</html>