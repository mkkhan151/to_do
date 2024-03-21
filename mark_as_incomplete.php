<?php
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $task_id = $_GET['id'];

    $sql = "UPDATE tasks SET status='Incomplete' WHERE id=$task_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error Updating record: " . $conn->error;
    }

}
?>