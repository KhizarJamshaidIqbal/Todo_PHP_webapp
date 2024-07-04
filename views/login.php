<?php include '../init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
            <div>
                <h2 class="text-center text-3xl font-extrabold text-gray-900">Log in to your account</h2>
            </div>
            <form action="../actions/login_action.php" method="POST" class="mt-8 space-y-6">
                <input type="text" name="username" placeholder="Username" class="border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring focus:ring-indigo-200">
                <input type="password" name="password" placeholder="Password" class="border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring focus:ring-indigo-200 mt-4">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-md w-full mt-4 hover:bg-blue-600 transition duration-200">Login</button>
            </form>
            <p class="mt-4 text-center text-sm text-gray-600">Don't have an account? <a href="register.php" class="text-blue-500">Register here</a></p>
        </div>
    </div>
</body>
</html>
