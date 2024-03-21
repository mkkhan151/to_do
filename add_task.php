<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_name = $_POST['task_name'];

    // check for empty task
    if($task_name == ""){
        header("Location: index.php");
        exit;
    }

    $sql = "INSERT INTO tasks (task_name) VALUES ('$task_name')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>