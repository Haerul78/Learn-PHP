<?php
include("connection.php");

$id = $_GET['id'];
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
    <title>Profil Pegawai</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 p-8 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center"><?= htmlspecialchars($pegawai['nama']) ?></h1>
        
        <div class="space-y-4 text-gray-700">
            <div class="flex justify-between items-center">
                <span class="font-semibold text-gray-600">Jenis kelamin:</span>
                <span><?= htmlspecialchars($pegawai['jenis_kelamin'])?></span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-semibold text-gray-600">Alamat:</span>
                <span><?= htmlspecialchars($pegawai['alamat'])?></span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-semibold text-gray-600">Tempat lahir:</span>
                <span><?= htmlspecialchars($pegawai['tempat_lahir'])?></span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-semibold text-gray-600">Tanggal lahir:</span>
                <span><?= date("d/m/Y", strtotime($pegawai['tanggal_lahir'])) ?></span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-semibold text-gray-600">Nomor seluler:</span>
                <span><?= htmlspecialchars($pegawai['nomor_seluler'])?></span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-semibold text-gray-600">Status perkawinan:</span>
                <span><?= htmlspecialchars($pegawai['status_perkawinan'])?></span>
            </div>
        </div>

        <div class="mt-8 flex justify-center gap-4">
            <a href="update.php?id=<?=$pegawai['id']?>" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-md transition-colors duration-300">Edit</a>
            <a href="list.php" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-md transition-colors duration-300">Kembali</a>
        </div>
    </div>
</body>
</html>