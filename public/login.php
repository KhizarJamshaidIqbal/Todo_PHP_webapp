<?php
require '../config/auth.php'; // Adjusted path to match the location of auth.php relative to login.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (login($username, $password)) {
        header("Location: todos.php");
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link to Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="max-w-md w-full bg-white shadow-md rounded-lg p-8">
        <h2 class="text-3xl font-bold mb-6 text-center">Login</h2>
        <form method="post" class="space-y-4">
            <div>
                <input type="text" name="username" placeholder="Username" class="w-full rounded-lg py-2 px-4 border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
            </div>
            <div>
                <input type="password" name="password" placeholder="Password" class="w-full rounded-lg py-2 px-4 border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded inline-block w-full">Login</button>
        </form>
        <?php if (isset($error)) { echo "<p class='text-red-500 mt-2'>$error</p>"; } ?>
    </div>
</body>
</html>
