<?php
require '../config/auth.php'; // Adjusted path to match the location of auth.php
require '../config/todos.php'; // Adjusted path to match the location of todos.php

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$todos = getTodos($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <!-- Link to Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100 py-6">
    <div class="max-w-2xl mx-auto px-4">

        <!-- Header with Todo List and Logout Button -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl font-bold">Todo List</h2>
            <a href="logout.php" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded inline-block">
            <span class="mr-2"><i class="fas fa-sign-out-alt"></i></span> Logout</a>
            <?php if (isset($user)): ?>
                <div class="flex items-center">
                    <span class="text-gray-600 text-sm mr-2">Logged in as:</span>
                    <span class="font-semibold"><?php echo htmlspecialchars($user['username']); ?></span>
                </div>
            <?php endif; ?>
        </div>
        
        
        <!-- Create Todo Button -->
        <a href="create_todo.php" class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded inline-block w-full mb-8 flex items-center justify-center text-xl font-bold">Create Todo</a>

        <!-- Todo List -->
        <div class="space-y-4">
            <?php foreach ($todos as $todo): ?>
                <div class="bg-white shadow-md rounded-lg p-4 flex items-center justify-between">
                    <div class="text-center"> <!-- Center aligns the title -->
                        <a href="view_todo.php?id=<?php echo $todo['id']; ?>" class="text-blue-500 hover:underline"><?php echo $todo['title']; ?></a>
                    </div>
                    <div class="space-x-2">
                        <a href="edit_todo.php?id=<?php echo $todo['id']; ?>" class="text-yellow-500 hover:underline">Edit</a>
                        <a href="delete_todo.php?id=<?php echo $todo['id']; ?>" class="text-red-500 hover:underline">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
