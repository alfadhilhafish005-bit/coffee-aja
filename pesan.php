<?php
include 'includes/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Pemesanan - Coffee Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f3ef;
            font-family: 'Poppins', sans-serif;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #5a3e36;
            margin-bottom: 25px;
        }

        .btn-order {
            background-color: #6f4e37;
            color: white;
            border: none;
        }

        .btn-order:hover {
            background-color: #8b5e3c;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>☕ Form Pemesanan Coffee Store</h2>

        <?php
        // Proses kirim form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama   = mysqli_real_escape_string($koneksi, $_POST['nama']);
            $nohp   = mysqli_real_escape_string($koneksi, $_POST['nohp']);
            $produk = mysqli_real_escape_string($koneksi, $_POST['produk']);
            $jumlah = intval($_POST['jumlah']);

            $query = "INSERT INTO pesanan (nama, nohp, produk, jumlah)
                  VALUES ('$nama', '$nohp', '$produk', '$jumlah')";

            if (mysqli_query($koneksi, $query)) {
                echo '<div class="alert alert-success">✅ Pesanan berhasil dikirim! Kami akan segera menghubungi Anda.</div>';
            } else {
                echo '<div class="alert alert-danger">❌ Terjadi kesalahan: ' . mysqli_error($koneksi) . '</div>';
            }
        }
        ?>

        <form method="POST">
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>No. HP / WhatsApp</label>
                <input type="text" name="nohp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Pilih Produk</label>
                <select name="produk" class="form-select" required>
                    <option value="">-- Pilih Produk --</option>
                    <?php
                    $produk = $koneksi->query("SELECT * FROM produk_kopi");
                    if ($produk && $produk->num_rows > 0) {
                        while ($row = $produk->fetch_assoc()) {
                            echo "<option value='{$row['nama_produk']}'>{$row['nama_produk']}</option>";
                        }
                    } else {
                        echo "<option disabled>Tidak ada produk tersedia</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Jumlah</label>
                <input type="number" name="jumlah" class="form-control" min="1" required>
            </div>
            <button type="submit" class="btn btn-order w-100">Kirim Pesanan</button>
        </form>
    </div>

</body>

</html>