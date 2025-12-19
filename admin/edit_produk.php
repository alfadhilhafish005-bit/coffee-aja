<?php
include '../includes/koneksi.php';

// Validasi apakah ada ID yang dikirim
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("<div class='alert alert-danger text-center'>ID produk tidak ditemukan!</div>");
}

$id = intval($_GET['id']);

// Ambil data produk dari database
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM produk_kopi WHERE id_produk=$id"));

if (!$data) {
    die("<div class='alert alert-danger text-center'>Produk tidak ditemukan!</div>");
}

// Jika tombol update diklik
if (isset($_POST['update'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    // Folder target upload
    $targetDir = "../images/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Jika upload gambar baru
    if (!empty($_FILES['gambar']['name'])) {
        $fileName = basename($_FILES["gambar"]["name"]);
        $targetFile = $targetDir . $fileName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $allowedTypes = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedTypes)) {
            echo "<div class='alert alert-danger text-center'>Hanya file JPG, JPEG, PNG, GIF yang diizinkan!</div>";
        } else {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
                $gambarPath = "images/" . $fileName;
            } else {
                echo "<div class='alert alert-danger text-center'>Upload gambar gagal.</div>";
                $gambarPath = $data['gambar']; // Gunakan gambar lama jika gagal upload
            }
        }
    } else {
        $gambarPath = $data['gambar']; // Gunakan gambar lama
    }

    // Query update data
    $query = "UPDATE produk_kopi SET 
                nama_produk='$nama',
                harga='$harga',
                kategori='$kategori',
                deskripsi='$deskripsi',
                gambar='$gambarPath'
              WHERE id_produk=$id";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Produk berhasil diperbarui!'); window.location='../admin.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Gagal mengubah data: " . mysqli_error($koneksi) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Produk - Coffee Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Produk Kopi</h2>
        <div class="card shadow p-4">
            <form method="POST" enctype="multipart/form-data">
                <input type="text" name="nama_produk" class="form-control mb-3" value="<?= htmlspecialchars($data['nama_produk']) ?>" required>
                <input type="number" name="harga" class="form-control mb-3" value="<?= htmlspecialchars($data['harga']) ?>" required>
                <input type="text" name="kategori" class="form-control mb-3" value="<?= htmlspecialchars($data['kategori']) ?>">
                <textarea name="deskripsi" class="form-control mb-3" rows="4"><?= htmlspecialchars($data['deskripsi']) ?></textarea>

                <p>Gambar Saat Ini:</p>
                <img src="../<?= htmlspecialchars($data['gambar']) ?>" width="150" class="mb-3 rounded shadow">

                <div class="mb-3">
                    <label for="gambar">Upload Gambar Baru (Opsional):</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <button type="submit" name="update" class="btn btn-primary w-100">Update Produk</button>
            </form>

            <a href="../admin.php" class="btn btn-secondary w-100 mt-2">Kembali</a>
        </div>
    </div>

</body>

</html>