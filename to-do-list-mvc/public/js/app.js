$(document).ready(function() {
    // Fetch tasks when the page loads
    fetchTasks();

    // Function to fetch tasks via AJAX
    function fetchTasks() {
        $.ajax({
            url: '/task/fetch',  // Endpoint to get the tasks
            type: 'GET',
            success: function(response) {
                let tasks = JSON.parse(response);  // Parse the JSON response
                renderTaskTable(tasks);  // Render tasks dynamically in the table
            },
            error: function(xhr, status, error) {
                console.error("Error fetching tasks:", error);
            }
        });
    }

    // Function to render the task table dynamically
    function renderTaskTable(tasks) {
        let tableBody = $('#task_table');  // Get the table body element
        tableBody.empty();  // Clear the existing rows

        tasks.forEach((task, index) => {
            let taskRow = `<tr>
                <td>${index + 1}</td>
                <td>${task.task}</td>
                <td>
                    <input type="checkbox" class="task-checkbox" data-id="${task.task_id}" ${task.is_completed ? 'checked' : ''}>
                </td>
                <td>
                    <button class="delete-btn" data-id="${task.task_id}">Delete</button>
                </td>
            </tr>`;
            tableBody.append(taskRow);  // Append the new row to the table
        });
    }

    // Add task via AJAX
    $('#add_task_form').submit(function(e) {
        e.preventDefault();  // Prevent the default form submission

        let taskValue = $('#task').val();

        $.ajax({
            url: '/task/add',  // The route to add the task
            type: 'POST',
            data: { task: taskValue },
            success: function(response) {
                // After adding the task, fetch the updated task list and render it
                fetchTasks();
                $('#task').val(''); // Clear the input field
            },
            error: function(xhr, status, error) {
                console.error("Error adding task:", error);
            }
        });
    });

    
    //update task
    $(document).on('change', '.task-checkbox', function(){
        let task_id = $(this).data('id');
        let is_completed = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: '/task/update',
            type: 'POST',
            data: {task_id: task_id, is_completed: is_completed},
            success: function(response){
                fetchTasks();
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
            url: '/task/delete',
            type: 'POST',
            data: {task_id: task_id},
            success: function(response){
                fetchTasks();
            }, 
            error: function(error){
                console.error("Error deleting task:", error);
            }
        })
    })

});

