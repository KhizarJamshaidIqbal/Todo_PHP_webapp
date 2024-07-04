<?php
include '../init.php';

// Fetch todo details based on todo_id
$todo_id = $_GET['todo_id'];
$stmt = $conn->prepare("SELECT * FROM todos WHERE id = ?");
$stmt->bind_param("i", $todo_id);
$stmt->execute();
$result = $stmt->get_result();
$todo = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Todo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <?php include '../includes/header.php'; ?>
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
            <div class="px-6 py-4">
                <h1 class="text-2xl font-bold mb-4">Edit Todo</h1>
                <form action="../actions/todo_action.php" method="POST">
                    <input type="hidden" name="todo_id" value="<?php echo $todo['id']; ?>">
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="title" placeholder="Enter title" value="<?php echo $todo['title']; ?>" class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md py-2 px-3 mt-1">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" placeholder="Enter description" rows="4" class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md py-2 px-3 mt-1"><?php echo $todo['description']; ?></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" name="action" value="update" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Update Todo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
