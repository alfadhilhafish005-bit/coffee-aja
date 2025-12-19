<?php
include 'includes/koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Coffee Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f3ef;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #4b2e05;
        }

        h2 {
            color: #4b2e05;
            font-weight: 700;
        }

        .table img {
            border-radius: 8px;
            object-fit: cover;
        }

        footer {
            background-color: #4b2e05;
            color: #fff;
        }

        .btn-success {
            background-color: #6f4e37;
            border: none;
        }

        .btn-success:hover {
            background-color: #8b5e3c;
        }
    </style>
</head>

<body>

    <!-- 🔹 Navbar -->
    <nav class="navbar navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold">☕ Admin Coffee Store</a>
            <a href="admin/login.php" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </nav>

    <!-- 🔹 Manajemen Produk -->
    <div class="container my-5">
        <h2 class="mb-4 text-center">📦 Manajemen Produk Kopi</h2>
        <a href="admin/tambah_produk.php" class="btn btn-success mb-3">+ Tambah Produk</a>

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $koneksi->query("SELECT * FROM produk_kopi ORDER BY id_produk DESC");
                $no = 1;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                    <tr>
                        <td class='text-center'>$no</td>
                        <td class='text-center'><img src='{$row['gambar']}' width='80' height='80' alt='Produk'></td>
                        <td>{$row['nama_produk']}</td>
                        <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                        <td>{$row['kategori']}</td>
                        <td class='text-center'>
                            <a href='admin/edit_produk.php?id={$row['id_produk']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='admin/hapus_produk.php?id={$row['id_produk']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                        </td>
                    </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Belum ada produk.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- 🔹 Manajemen Pesanan -->
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>📝 Data Pesanan Pelanggan</h2>
            <a href="admin/cetak_pesanan.php" target="_blank" class="btn btn-outline-success">🖨️ Cetak Pesanan (PDF)</a>
        </div>

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No. HP</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $pesanan = $koneksi->query("SELECT * FROM pesanan ORDER BY id DESC");
                $no = 1;
                if ($pesanan->num_rows > 0) {
                    while ($row = $pesanan->fetch_assoc()) {
                        $tanggal = isset($row['tanggal']) ? $row['tanggal'] : '-';
                        echo "
                    <tr>
                        <td class='text-center'>$no</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['nohp']}</td>
                        <td>{$row['produk']}</td>
                        <td class='text-center'>{$row['jumlah']}</td>
                        <td>{$tanggal}</td>
                        <td class='text-center'>
                            <a href='admin/hapus_pesanan.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Hapus pesanan ini?')\">Hapus</a>
                        </td>
                    </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Belum ada pesanan masuk.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- 🔹 Manajemen Komentar -->
    <div class="container my-5">
        <h2 class="mb-4 text-center">💬 Komentar Pengunjung</h2>

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Komentar</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $komentar = $koneksi->query("SELECT * FROM komentar ORDER BY id DESC");
                $no = 1;
                if ($komentar->num_rows > 0) {
                    while ($row = $komentar->fetch_assoc()) {
                        echo "
                    <tr>
                        <td class='text-center'>$no</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['isi']}</td>
                        <td>" . date('d M Y, H:i', strtotime($row['tanggal'])) . "</td>
                        <td class='text-center'>
                            <a href='admin/hapus_komentar.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus komentar ini?')\">Hapus</a>
                        </td>
                    </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Belum ada komentar.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <!-- 🔹 Footer -->
    <footer class="py-3 text-center">
        <p>© 2025 Coffee Store Admin — Manage Your Coffee & Orders ☕</p>
    </footer>

</body>

</html>