<?php include '../init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Todos</title>
    <style>
        html, body {
            height: 100%;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    <?php include '../includes/header.php'; ?>
    <div class="container mx-auto p-4 flex-grow">
        <h1 class="text-3xl font-bold mb-4">My Todos</h1>
        <form action="../actions/todo_action.php" method="POST" class="mb-8">
            <input type="text" name="title" placeholder="Title" class="border rounded-lg px-3 py-2 mb-3 w-full focus:outline-none focus:border-blue-500">
            <textarea name="description" placeholder="Description" class="border rounded-lg px-3 py-2 mb-3 w-full h-32 resize-none focus:outline-none focus:border-blue-500"></textarea>
            <button type="submit" name="action" value="add" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Add Todo</button>
        </form>
        <div>
            <?php
            $user_id = $_SESSION['user_id'];
            $result = $conn->query("SELECT * FROM todos WHERE user_id = $user_id");
            while ($todo = $result->fetch_assoc()) {
            ?>
                <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                    <h2 class="text-xl font-bold mb-2"><?= $todo['title']; ?></h2>
                    <p class="text-gray-700 mb-4"><?= $todo['description']; ?></p>
                    <div class="flex space-x-2">
                        <form action="../views/edit.php" method="GET">
                            <input type="hidden" name="todo_id" value="<?= $todo['id']; ?>">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Edit</button>
                        </form>
                        <form action="../actions/todo_action.php" method="POST">
                            <input type="hidden" name="todo_id" value="<?= $todo['id']; ?>">
                            <button type="submit" name="action" value="delete" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-200">Delete</button>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
