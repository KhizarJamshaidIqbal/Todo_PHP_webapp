<?php include '../init.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Admin - All Todos</title>
</head>

<body class="bg-gray-100">
    <?php include '../includes/header.php'; ?>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">All Todos</h1>

        <?php
        // Retrieve usernames of users who have todos
        $result = $conn->query("SELECT DISTINCT users.username FROM users JOIN todos ON users.id = todos.user_id");

        // Check if there are users with todos
        if ($result->num_rows > 0) {
            // Loop through each user
            while ($user = $result->fetch_assoc()) {
                // Display username as a group header
                echo '<div class="bg-white rounded-lg shadow-md mb-6">';
                echo '<div class="px-6 py-4 border-b">';
                echo '<h2 class="text-xl font-bold">' . $user['username'] . '\' Todos</h2>';
                echo '</div>';

                // Retrieve todos for the current user
                $username = $user['username'];
                $todos_result = $conn->query("SELECT todos.* FROM todos JOIN users ON todos.user_id = users.id WHERE users.username = '$username'");

                // Display todos
                while ($todo = $todos_result->fetch_assoc()) {
                    echo '<div class="px-6 py-4 border-b">';
                    echo '<h3 class="text-lg font-bold">' . $todo['title'] . '</h3>';
                    echo '<p class="text-gray-700">' . $todo['description'] . '</p>';
                    echo '</div>';
                }

                echo '</div>'; // Close user's todos container
            }
        } else {
            echo '<p class="text-center text-gray-600">No users found with todos.</p>';
        }
        ?>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>

</html>
