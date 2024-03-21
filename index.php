<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>To-Do List</h1>
        <form action="add_task.php" method="POST">
            <input type="text" name="task_name" placeholder="Enter task...">
            <button type="submit">Add Task</button>
        </form>
        <ul class="tasks">
            <?php
            // Display all tasks
            $sql = "SELECT * FROM tasks";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<li class='task'>";
                echo "<span class='task-name " . ($row['status'] == 'Complete' ? 'completed' : '') . "'>" . $row['task_name'] . "</span>";
                echo "<span class='btns'>";

                // mark as complete/incomplete button based on status
                if($row["status"] == "Incomplete"){
                    echo "<a class='complete-btn' href='mark_as_complete.php?id=" . $row['id'] . "'>Mark as Complete</a> ";
                }else{
                    echo "<a class='incomplete-btn' href='mark_as_incomplete.php?id=" . $row['id'] . "'>Mark as Incomplete</a> ";
                }

                // add edit and delete button
                echo "<a class='edit-btn' href='edit_task.php?id=" . $row['id'] . "'>Edit</a> ";
                echo "<a class='delete-btn' href='delete_task.php?id=" . $row['id'] . "'>Delete</a>";
                echo "</span>";
                echo "</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>