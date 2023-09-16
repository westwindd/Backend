<?php
include 'database.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task']) && !empty($_POST['task'])){
    $task = $_POST['task'];

    $stmt = $conn->prepare("INSERT INTO todos (task) VALUES (?)");
    if ($stmt === false) {
        die("Failed to prepare the statement: " . $conn->error);
    }
    $stmt->bind_param("s", $task);
    
    if($stmt->execute()){
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}

$conn->close();
?>
