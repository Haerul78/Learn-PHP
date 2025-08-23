<?php
session_start();

$file = 'data.json';
if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

$todos = json_decode(file_get_contents($file), true);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Todo'])) {
    $newTodo = trim($_POST['Todo']);
    if (!empty($newTodo)) {
        $todos[] = $newTodo;
        file_put_contents($file, json_encode($todos, JSON_PRETTY_PRINT));
        $_SESSION['message'] = "Task berhasil ditambahkan! ✅";
    } else {
        $_SESSION['message'] = "⚠️ Error: Teks belum diinputkan.";
    }
    header('Location: index.php');
    exit;
}

if (isset($_POST['hapus_todo'])) {
    $index = $_POST['hapus_todo'];
    if (isset($todos[$index])) {
        unset($todos[$index]);
        $todos = array_values($todos);
        file_put_contents($file, json_encode($todos, JSON_PRETTY_PRINT));
        $_SESSION['message'] = "Task berhasil dihapus! 🗑️";
    }
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_todo']) && isset($_POST['Todo_edit'])) {
    $index = $_POST['edit_todo'];
    $newTodo = trim($_POST['Todo_edit']);
    if (isset($todos[$index]) && !empty($newTodo)) {
        $todos[$index] = $newTodo;
        file_put_contents($file, json_encode($todos, JSON_PRETTY_PRINT));
        $_SESSION['message'] = "Task berhasil diedit! ✨";
    } else {
        $_SESSION['message'] = "⚠️ Error: Teks edit tidak boleh kosong.";
    }
    header('Location: index.php');
    exit;
}

$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 2rem;
            background-color: #f8fafc;
        }
    </style>
    <title>Simple Todo List</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Todo List Sederhana</h1>

        <form action="" method="post" class="mb-6 flex gap-2">
            <input type="text" name="Todo" placeholder="Tambahkan tugas baru..." class="flex-grow p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 transition duration-200">
            <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white font-semibold py-3 px-6 rounded-md transition duration-200">Tambah</button>
        </form>
        
        <?php if (!empty($message)): ?>
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded-md mb-4" role="alert">
                <p><?= htmlspecialchars($message) ?></p>
            </div>
        <?php endif; ?>

        <?php if (empty($todos)): ?>
            <p class="text-center text-gray-500 italic mt-8">Tidak ada tugas. Mari tambahkan satu!</p>
        <?php else: ?>
            <table class="w-full table-fixed border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left w-1/12 rounded-tl-lg">No</th>
                        <th class="py-3 px-6 text-left w-6/12">Tugas</th>
                        <th class="py-3 px-6 text-center w-6/12 rounded-tr-lg">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <?php foreach ($todos as $index => $value): ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left font-medium"><?= $index + 1 ?></td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <?= htmlspecialchars($value) ?>
                            </td>
                            <td class="py-6 px-8 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <form action="" method="post" class="flex items-center gap-2">
                                        <input type="hidden" name="edit_todo" value="<?= $index ?>">
                                        <input type="text" name="Todo_edit" placeholder="Edit..." class="p-2 w-32 text-xs border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-400">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-3 rounded-md text-xs transition-colors duration-200">Edit</button>
                                    </form>
                                    <form action="" method="post" class="flex items-center">
                                        <input type="hidden" name="hapus_todo" value="<?= $index ?>">
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-3 rounded-md text-xs transition-colors duration-200">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>