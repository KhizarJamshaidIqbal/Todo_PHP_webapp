<?php
require '../config/db.php'; // Adjusted path to match the location of db.php
session_start();

function getTodos($user_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT id, title, description, created_at FROM todos WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getTodoById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT id, title, description, created_at FROM todos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function createTodo($user_id, $title, $description) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO todos (user_id, title, description) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $title, $description);
    return $stmt->execute();
}

function updateTodo($id, $title, $description) {
    global $conn;
    $stmt = $conn->prepare("UPDATE todos SET title = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $description, $id);
    return $stmt->execute();
}

function deleteTodo($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM todos WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>
