<?php
include '../includes/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $koneksi->query("DELETE FROM pesanan WHERE id='$id'");
}

header("Location: ../admin.php");
exit;
