<?php
include '../init.php';

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/login.php");
    exit;
}

// Determine user role
$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];

// Redirect admin to admin page
if ($role == 'admin') {
    header("Location: ../views/admin.php");
    exit;
}

// Redirect regular users to their todos
header("Location: ../views/todos.php");
exit;
?>
