<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $nomor_seluler = !empty($_POST['nomor_seluler']) ? $_POST['nomor_seluler'] : "Belum ada";
    $status_perkawinan = $_POST['status_perkawinan'];

    try {
        // Menggunakan prepared statement untuk mencegah SQL injection
        $stmt = mysqli_prepare($connection, "INSERT INTO pegawai (nama, jenis_kelamin, alamat, tempat_lahir, tanggal_lahir, nomor_seluler, status_perkawinan) VALUES (?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssssss", $nama, $jenis_kelamin, $alamat, $tempat_lahir, $tanggal_lahir, $nomor_seluler, $status_perkawinan);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    } catch (Exception $e) {
        echo "Gagal insert ke database: ". $e->getMessage();
    }
    header('Location: list.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 p-8 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Tambah Data Pegawai</h1>
        <form action="" method="post" class="space-y-4">
            <div class="flex flex-col">
                <label for="nama" class="mb-1 text-gray-600">Nama:</label>
                <input type="text" id="nama" name="nama" required class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex flex-col">
                <label for="jenis_kelamin" class="mb-1 text-gray-600">Jenis kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            
            <div class="flex flex-col">
                <label for="alamat" class="mb-1 text-gray-600">Alamat:</label>
                <textarea id="alamat" name="alamat" required class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
            </div>
            
            <div class="flex flex-col">
                <label for="tempat_lahir" class="mb-1 text-gray-600">Tempat lahir:</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" required class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex flex-col">
                <label for="tanggal_lahir" class="mb-1 text-gray-600">Tanggal lahir:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex flex-col">
                <label for="nomor_seluler" class="mb-1 text-gray-600">Nomor seluler:</label>
                <input type="text" id="nomor_seluler" name="nomor_seluler" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex flex-col">
                <label for="status_perkawinan" class="mb-1 text-gray-600">Status perkawinan:</label>
                <select id="status_perkawinan" name="status_perkawinan" required class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="Menikah">Menikah</option>
                    <option value="Belum Menikah">Belum menikah</option>
                </select>
            </div>
            
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded-md transition-colors duration-300">Tambah</button>
        </form>
        <a href="list.php" class="block text-center mt-4 text-gray-500 hover:text-gray-700 transition-colors duration-300">Kembali</a>
    </div>
</body>
</html>