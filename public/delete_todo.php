<?php
require '../config/auth.php'; // Adjusted path to match the location of auth.php
require '../config/todos.php'; // Adjusted path to match the location of todos.php
if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

if (deleteTodo($id)) {
    header("Location: todos.php");
} else {
    echo "Failed to delete todo.";
}
?>
