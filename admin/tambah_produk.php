<?php
include '../includes/koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];

    // Pastikan folder images ada
    $targetDir = "../images/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Ambil informasi file
    $fileName = basename($_FILES["gambar"]["name"]);
    $targetFile = $targetDir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Validasi: pastikan yang diupload adalah gambar
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check === false) {
        die("<div class='alert alert-danger text-center'>File bukan gambar!</div>");
    }

    // Batasi jenis file yang boleh diupload
    $allowedTypes = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedTypes)) {
        die("<div class='alert alert-danger text-center'>Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan!</div>");
    }

    // Pindahkan file ke folder images
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
        // Simpan ke database (path gambar disimpan relatif terhadap index.php)
        $gambarPath = "images/" . $fileName;
        $query = "INSERT INTO produk_kopi (nama_produk, deskripsi, harga, kategori, gambar)
                  VALUES ('$nama', '$deskripsi', '$harga', '$kategori', '$gambarPath')";

        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Produk berhasil ditambahkan!'); window.location='../admin.php';</script>";
        } else {
            echo "<div class='alert alert-danger'>Gagal menyimpan ke database: " . mysqli_error($koneksi) . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Upload gambar gagal! Pastikan folder images bisa diakses.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Produk - Coffee Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Tambah Produk Kopi</h2>
        <div class="card shadow p-4">
            <form method="POST" enctype="multipart/form-data">
                <input type="text" name="nama_produk" class="form-control mb-3" placeholder="Nama Produk" required>
                <input type="number" name="harga" class="form-control mb-3" placeholder="Harga" required>
                <input type="text" name="kategori" class="form-control mb-3" placeholder="Kategori (contoh: Arabica, Robusta)">
                <textarea name="deskripsi" class="form-control mb-3" rows="4" placeholder="Deskripsi Produk"></textarea>
                <input type="file" name="gambar" class="form-control mb-3" required>
                <button type="submit" name="simpan" class="btn btn-success w-100">Simpan Produk</button>
            </form>
            <a href="../admin.php" class="btn btn-secondary w-100 mt-2">Kembali</a>
        </div>
    </div>

</body>

</html>