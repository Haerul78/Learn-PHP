<?php
include("connection.php");

$id = $_GET['id'];
if (!$id) {
    header('Location: list.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $stmt = mysqli_prepare($connection, "DELETE FROM pegawai WHERE id=?");

    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header('Location: list.php');
        exit;
    } else {
        mysqli_stmt_close($stmt);
        echo "Gagal menghapus data.";
        exit;
    }
    
}

header('Location: list.php');
exit;
?>