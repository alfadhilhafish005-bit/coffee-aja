<?php
include '../includes/koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM komentar WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Komentar berhasil dihapus!');
                window.location.href='../admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus komentar.');
                window.location.href='../admin.php';
              </script>";
    }
} else {
    header("Location: ../admin.php");
}
