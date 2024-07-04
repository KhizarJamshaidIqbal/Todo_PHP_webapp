<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="flex flex-col min-h-screen">
    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="../public/index.php" class="text-xl font-bold text-center ">Todo App</a>
            <div>
                <?php if (isset($_SESSION['username'])): ?>
                    <span class="mr-4 text-yellow-500">Welcome, <?php echo $_SESSION['username']; ?></span>
                    <a href="../actions/logout.php" class="ml-4">
                        <i class="fas fa-sign-out-alt text-red-500"></i> <!-- FontAwesome logout icon -->
                    </a>
                <?php else: ?>
                    <a href="../views/login.php">Login</a>
                    <a href="../views/register.php" class="ml-4">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
