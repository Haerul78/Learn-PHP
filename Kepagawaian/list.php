<?php
include("connection.php");

$search = $_GET['search'] ?? '';
$search = trim($search);

if (!empty($search)) {
    $stmt = mysqli_prepare($connection, "SELECT * FROM pegawai WHERE nama LIKE ? OR alamat LIKE ? OR tempat_lahir LIKE ? OR jenis_kelamin LIKE ? ORDER BY nama ASC");
    $search_pattern = "%$search%";
    mysqli_stmt_bind_param($stmt, "ssss", $search_pattern, $search_pattern, $search_pattern, $search_pattern);
    mysqli_stmt_execute($stmt);
    $query_result = mysqli_stmt_get_result($stmt);
    $result = mysqli_fetch_all($query_result, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
} else {
    $query = mysqli_query($connection, "SELECT * FROM pegawai");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
}

$total_found = count($result);

function highlightSearch($text, $search) {
    if (empty($search)) return $text;
    return preg_replace('/(' . preg_quote($search, '/') . ')/i', '<mark style="background: yellow; border-radius: 4px; padding: 0 2px;">$1</mark>', $text);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pegawai</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 p-8 min-h-screen">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Pegawai</h1>
            <a href="add.php" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md transition-colors duration-300 shadow-md">Tambah Data Baru</a>
        </div>

        <form action="" method="get" class="flex gap-2 mb-6">
            <input type="text" name="search" placeholder="Cari pegawai..." value="<?= htmlspecialchars($search) ?>" class="flex-grow p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-md transition-colors duration-300">Cari</button>
            <a href="list.php" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-md transition-colors duration-300">Reset</a>
        </form>

        <?php if ($total_found > 0): ?>
            <p class="text-sm text-gray-600 mb-4">Ditemukan **<?= $total_found ?>** hasil.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php foreach($result as $index => $pegawai) : ?>
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200 hover:bg-gray-100 transition-colors duration-200">
                    <h2 class="text-xl font-semibold text-blue-700 mb-2">
                        <a href="profile.php?id=<?=$pegawai["id"]?>"><?php echo highlightSearch(htmlspecialchars($pegawai["nama"]), $search) ?></a>
                    </h2>
                    <p class="text-gray-600">
                        <span class="font-medium">Jenis Kelamin:</span> <?php echo highlightSearch(htmlspecialchars($pegawai["jenis_kelamin"]), $search) ?>
                    </p>
                    <p class="text-gray-600">
                        <span class="font-medium">Alamat:</span> <?php echo highlightSearch(htmlspecialchars($pegawai["alamat"]), $search) ?>
                    </p>
                    <div class="mt-4 flex gap-2">
                        <a href="profile.php?id=<?=$pegawai["id"]?>" class="text-blue-500 hover:underline text-sm font-medium">Lihat Detail</a>
                        <span class="text-gray-400">|</span>
                        <a href="hapus.php?id=<?=$pegawai["id"]?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="text-red-500 hover:underline text-sm font-medium">Hapus</a>
                    </div>
                </div>
                <?php endforeach?>
            </div>
        <?php else: ?>
            <div class="no-data text-center p-8 bg-gray-50 rounded-lg">
                <h3 class="text-2xl font-semibold text-gray-700 mb-2">🔍 Tidak ada hasil ditemukan</h3>
                <?php if (!empty($search)): ?>
                    <p class="text-gray-500">Tidak ada data yang mengandung "<strong><?= htmlspecialchars($search) ?></strong>"</p>
                    <p class="text-sm mt-2 text-gray-500">💡 Tips: Coba kata kunci lain atau <a href="list.php" class="text-blue-500 hover:underline">lihat semua data</a></p>
                <?php else: ?>
                    <p class="text-gray-500">Belum ada data pegawai dalam database</p>
                    <a href="add.php" class="inline-block mt-4 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md transition-colors duration-300">Tambah Data Pertama</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>