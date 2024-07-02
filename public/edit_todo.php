<?php
require '../config/auth.php'; // Adjusted path to match the location of auth.php
require '../config/todos.php'; // Adjusted path to match the location of todos.php

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$todo = getTodoById($id);

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    if (updateTodo($id, $title, $description)) {
        header("Location: todos.php");
    } else {
        $error = "Failed to update todo.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Todo</title>
    <!-- Link to Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 py-6">
    <div class="max-w-2xl mx-auto px-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-2 flex w-full items-center justify-center text-xl font-bold">Edit Todo</h2>
            <form method="post" class="mb-4">
                <label for="title" class="block mb-2 font-semibold text-gray-700">Title</label>
                <input type="text" name="title" id="title" placeholder="Title" value="<?php echo $todo['title']; ?>" class="w-full rounded-lg py-2 px-4 border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 mb-2" required>
                
                <label for="description" class="block mb-2 font-semibold text-gray-700">Description</label>
                <textarea name="description" id="description" placeholder="Description" class="w-full rounded-lg py-2 px-4 border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 mb-4"><?php echo $todo['description']; ?></textarea>
                
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded inline-block flex w-full items-center justify-center text-xl font-bold">Update</button>
            </form>
            <?php if (!empty($error)) { echo "<p class='text-red-500'>$error</p>"; } ?>
            <div class="flex space-x-2">
                <a href="todos.php" class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded inline-block flex w-full items-center justify-center text-xl font-bold">Back to Todo List</a>
            </div>
        </div>
    </div>
</body>
</html>
