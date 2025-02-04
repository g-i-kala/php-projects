<?php

include 'db.php';

$sql = "SELECT * FROM todo_list";
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->get_result();
//echo var_dump($result);
$table_data = [];

    if ($result->num_rows >0) {
        $row_count = 1;
        while ($row = $result->fetch_assoc()){
            echo "<tr class='table__row'>";
            echo "<td class='table__column'>".$row_count."</td>";
            echo "<td class='table__column table__column--task'>".htmlspecialchars($row['task'])."</td>";
            echo "<td class='table__column'> 
                    <input type='checkbox' class='task-checkbox' data-id='{$row['task_id']}' " . ($row['is_completed'] ? "checked" : "") . ">
                </td>
                <td class='table__column'>
                    <button class='btn delete-btn' data-id='{$row['task_id']}'>Delete</button>
                </td>
                </tr>";
            $row_count++;
            }
        } else {
        echo "<tr><td colspan='4'>No tasks found.</td></tr>";
    }
    

$stmt->close();
$conn->close();

?>



