<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>To-Do List</title>
</head>
<body>
<div class="container">
    <h1>To-Do List</h1>
    <form action="add_todo.php" method="POST">
        <input type="text" name="task" placeholder="New task...">
        <button type="submit">Add Task</button>
    </form>

    <ul class="todo-list">
    <?php
include 'database.php';

$result = $conn->query("SELECT * FROM todos ORDER BY created_at DESC");

if ($result === false) {
    die("Error executing query: " . $conn->error);
}

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        echo "<li>{$row['task']}</li>";
    }
} else {
    echo "<li>No tasks found</li>";
}
?>

    </ul>
</div>
</body>
</html>
