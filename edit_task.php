<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $task_id = $_GET['id'];
    
    // Fetch task details
    $sql = "SELECT * FROM tasks WHERE id=$task_id";
    $result = $conn->query($sql);
    $task = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
    .container {
    max-width: 960px;
    margin: 0 auto;
    padding: 20px;
    font-family: "Poppins", sans-serif;
    }

    input[type="text"] {
    width: 80%;
    padding: 8px 12px;
    margin-top: 15px;
    margin-right: 15px;
    border: 1px solid grey;
    border-radius: 8px;
    font-size: 20px;
    font-family: "Poppins", sans-serif;
}

button {
    padding: 8px 12px;
    background-color: rgb(40, 76, 224);
    font-weight: 600;
    border: none;
    border-radius: 8px;
    font-size: 20px;
    font-family: "Poppins", sans-serif;
    cursor: pointer;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Task</h1>
        <form action="update_task.php" method="POST">
            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
            <input type="text" name="task_name" value="<?php echo $task['task_name']; ?>">
            <button type="submit">Update Task</button>
        </form>
    </div>
</body>
</html>