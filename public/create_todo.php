<?php
require '../config/auth.php'; // Adjusted path to match the location of auth.php
require '../config/todos.php'; // Adjusted path to match the location of todos.php

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    if (createTodo($user_id, $title, $description)) {
        header("Location: todos.php");
    } else {
        $error = "Failed to create todo.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Todo</title>
    <!-- Link to Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 py-6">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg px-8 py-6">
        <h2 class="text-2xl font-bold mb-4">Create Todo</h2>
        <form method="post" class="mb-4">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter title" class="w-full rounded-lg py-2 px-4 border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea id="description" name="description" placeholder="Enter description" class="w-full rounded-lg py-2 px-4 border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" rows="4"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded inline-block w-full items-center justify-center text-xl font-bold">Create</button>
        </form>
        <?php if (!empty($error)) {
            echo "<p class='text-red-500'>$error</p>";
        } ?>
        <div class="flex space-x-2">
            <a href="todos.php" class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded inline-block w-full flex items-center justify-center text-lg font-bold">
                Back to Todo List
            </a>
        </div>

    </div>
</body>

</html>