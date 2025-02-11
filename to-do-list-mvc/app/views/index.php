<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css"?v=1.1>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Todo List</title>

</head>
<body>
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
                    <!-- dynamic table --> 
                    
                </tbody>
            </table>
            <div class="form__add__wrapper">
                 <!-- add task handling -->
                <form action="/task/add" method="POST" id="add_task_form" class="form__add">
                    <label for="task" class="input__field--label">Task</label>
                    <input type="text" id="task" name="task" class="input__field" required>
                    <button class="btn" type="submit">Add task</button>
                </form>
            </div>

    </div>
    </div>
    <script src="/js/app.js"></script>
</body>
</html>