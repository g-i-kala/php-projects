<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css"?v=1.1>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Todo List</title>

</head>
<body>
    <div class="page__container flex flex-col w-3/4 justify-center items-center m-auto">
        <h1 class="w-full text-3xl font-bold text-white text-center bg-gray-400 p-6">ToDo List</h1>
            <div class="flex flex-col justify-center w-full m-auto p-6 rounded-md shadow-md">
                <table class="table-auto border-collapse">
                    <tr class="border border-gray-300">
                        <th class="border border-gray-300">Task ID</th>
                        <th class="border border-gray-300">Task</th>
                        <th class="border border-gray-300">Status</th>
                        <th class="border border-gray-300">Actions</th>
                    </tr>
                    <tbody id='task_table' class="text-center">
                        <!-- dynamic table --> 
                        
                    </tbody>
                </table>
            
                <div class="flex justify-center w-full mt-6">
                    <!-- add task handling -->
                    <div class="w-3/4">
                        <form action="/task/add" method="POST" id="add_task_form" class="flex flex-col w-full">
                            <label for="task" class="text-gray-500">Task</label>
                            <input type="text" id="task" name="task" class="w-full border" required>
                            <button class="mt-4 bg-blue-500 hover:bg-green-700 text-white font-bold w-fix m-auto py-2 px-4 rounded" type="submit">Add task</button>
                        </form>
                    </div>
                </div>
            </div>
      
    </div>
    <script src="/js/app.js"></script>
</body>
</html>