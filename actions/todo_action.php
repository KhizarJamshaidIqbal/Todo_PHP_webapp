<?php
include '../init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];

    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action == 'add') {
            $title = $_POST['title'];
            $description = $_POST['description'];

            $stmt = $conn->prepare("INSERT INTO todos (user_id, title, description) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $user_id, $title, $description);
            $stmt->execute();
            $stmt->close();
            header("Location: ../views/todos.php");
            exit;
        } elseif ($action == 'update') {
            $todo_id = $_POST['todo_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];

            $stmt = $conn->prepare("UPDATE todos SET title = ?, description = ? WHERE id = ? AND user_id = ?");
            $stmt->bind_param("ssii", $title, $description, $todo_id, $user_id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                header("Location: ../views/todos.php");
            } else {
                echo "Error: Unable to update todo.";
            }

            $stmt->close();
            exit;
        } elseif ($action == 'delete') {
            $todo_id = $_POST['todo_id'];

            $stmt = $conn->prepare("DELETE FROM todos WHERE id = ? AND user_id = ?");
            $stmt->bind_param("ii", $todo_id, $user_id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                header("Location: ../views/todos.php");
            } else {
                echo "Error: Unable to delete todo.";
            }

            $stmt->close();
            exit;
        }
    }
}

?>
