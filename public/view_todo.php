<?php
require '../config/auth.php'; // Adjusted path to match the location of auth.php
require '../config/todos.php'; // Adjusted path to match the location of todos.php

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$todo = getTodoById($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Todo</title>
    <!-- Link to Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 py-6">
    <div class="max-w-2xl mx-auto px-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-2"><?php echo $todo['title']; ?></h2>
            <p class="text-gray-700 mb-4"><?php echo $todo['description']; ?></p>
            <p class="text-gray-600">Created at: <?php echo $todo['created_at']; ?></p>
            <div class="mt-4">
                <a href="todos.php" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded inline-block mr-2 flex w-full items-center justify-center text-xl font-bold">Back to List</a>
            </div>
        </div>
    </div>
</body>
</html>
