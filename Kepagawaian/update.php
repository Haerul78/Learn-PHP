<?php 
include("connection.php");

$id = $_GET['id'];
if (!$id) {
    header('Location: list.php');
    exit;
}

$message = '';

// Menangani permintaan POST untuk memperbarui data
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $stmt =  mysqli_prepare($connection, "UPDATE pegawai SET nama=?, jenis_kelamin=?, alamat=?, tempat_lahir=?, tanggal_lahir=?, nomor_seluler=?, status_perkawinan=? WHERE id=?");

    $nomor_seluler = !empty($_POST['nomor_seluler']) ? $_POST['nomor_seluler'] : "Belum ada";

    mysqli_stmt_bind_param($stmt, "sssssssi", $_POST['nama'],  $_POST['jenis_kelamin'], $_POST['alamat'], $_POST['tempat_lahir'], $_POST['tanggal_lahir'], $nomor_seluler, $_POST['status_perkawinan'], $id);

    if (mysqli_stmt_execute($stmt)) {
        $message = '✅ Data berhasil diupdate!';
    } else {
        $message = '❌ Gagal update data!';
    }
    mysqli_stmt_close($stmt);

    // Redirect setelah operasi
    header('Location: list.php');
    exit;
}

// Mengambil data pegawai untuk ditampilkan di form
$query = mysqli_prepare($connection, "SELECT * FROM pegawai WHERE id = ?");
mysqli_stmt_bind_param($query, "i", $id);
mysqli_stmt_execute($query);
$result = mysqli_stmt_get_result($query);
$pegawai = mysqli_fetch_assoc($result);

if (!$pegawai) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='list.php';</script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pegawai</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 p-8 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Data Pegawai</h1>

        <form action="" method="post" class="space-y-4">
            <div class="flex flex-col">
                <label for="nama" class="mb-1 text-gray-600">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($pegawai['nama']) ?>" required class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex flex-col">
                <label for="jenis_kelamin" class="mb-1 text-gray-600">Jenis kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="Laki-laki" <?= $pegawai['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="Perempuan" <?= $pegawai['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>
            
            <div class="flex flex-col">
                <label for="alamat" class="mb-1 text-gray-600">Alamat:</label>
                <textarea id="alamat" name="alamat" required class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"><?= htmlspecialchars($pegawai['alamat']) ?></textarea>
            </div>
            
            <div class="flex flex-col">
                <label for="tempat_lahir" class="mb-1 text-gray-600">Tempat lahir:</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?= htmlspecialchars($pegawai['tempat_lahir']) ?>" required class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex flex-col">
                <label for="tanggal_lahir" class="mb-1 text-gray-600">Tanggal lahir:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= $pegawai['tanggal_lahir'] ?>" required class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex flex-col">
                <label for="nomor_seluler" class="mb-1 text-gray-600">Nomor seluler:</label>
                <input type="text" id="nomor_seluler" name="nomor_seluler" value="<?= htmlspecialchars($pegawai['nomor_seluler']) ?>" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex flex-col">
                <label for="status_perkawinan" class="mb-1 text-gray-600">Status perkawinan:</label>
                <select id="status_perkawinan" name="status_perkawinan" required class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="Menikah" <?= $pegawai['status_perkawinan'] == 'Menikah' ? 'selected' : '' ?>>Menikah</option>
                    <option value="Belum Menikah" <?= $pegawai['status_perkawinan'] == 'Belum Menikah' ? 'selected' : '' ?>>Belum menikah</option>
                </select>
            </div>
            
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded-md transition-colors duration-300">Update</button>
        </form>
        <a href="list.php" class="block text-center mt-4 text-gray-500 hover:text-gray-700 transition-colors duration-300">Kembali</a>
    </div>
</body>
</html>