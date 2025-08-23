<?php
    $file = 'data.json';
    $todos = json_decode(file_get_contents($file),true);

    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['key'])){
        $key = $_GET['key'];

        if (array_key_exists($key, $todos)){
            unset($todos[$key]);
            $todos = array_values($todos);
            file_put_contents($file, json_encode($todos, JSON_PRETTY_PRINT));
            header('Location: index.php');
            exit;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' & isset($_POST['todo'])) {
        $newTodo = $_POST['todo'];
        $todos[] = $newTodo;
        file_put_contents($file, json_encode($todos, JSON_PRETTY_PRINT));
        header('Location: index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    /* Ketika checkbox dicentang, cari elemen label yang berdekatan dan terapkan style */
        input[type="checkbox"]:checked + label {
            text-decoration: line-through; /* Memberi efek coretan pada teks */
            color: #888; /* Mengubah warna teks menjadi sedikit abu-abu */
        }
    </style>
</head>
<body>
    <h1>Todo App</h1>
    <form action="" method="post">
        <p>Daftar Belanja Hari ini:</p>
        <input type="text" name="todo" placeholder="To do list">
        <button type="submit">Submit</button>
        
    </form>
    <ul>
        <?php
            foreach ($todos as $key => $todo) {
                echo "<li>
                    <input type='checkbox' name='todo'>
                    <label>$todo $key</label>
                    <a href='?action=delete&key=$key'>Hapus</a>
                </li>";
            }
        ?>
    </ul>
</body>
</html>