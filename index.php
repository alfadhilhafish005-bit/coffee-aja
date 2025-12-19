    <?php include 'includes/koneksi.php'; ?>
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <title>Coffee Store - Nikmati Cita Rasa Nusantara</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #f8f3ef;
                color: #3b2f2f;
            }

            .navbar {
                background-color: #4b2e05 !important;
                box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
            }

            .navbar-brand {
                font-weight: bold;
                color: #f1d9b7 !important;
            }

            .nav-link {
                color: #f3e5d0 !important;
                transition: color 0.3s;
            }

            .nav-link:hover {
                color: #c89b6d !important;
            }

            .btn-outline-light {
                border-color: #d2b48c;
                color: #f1d9b7 !important;
            }

            .btn-outline-light:hover {
                background-color: #c89b6d;
                color: white !important;
            }

            .search-bar input {
                border-radius: 20px;
                border: none;
                padding: 6px 14px;
                outline: none;
            }

            .search-bar button {
                border-radius: 20px;
                background-color: #c89b6d;
                border: none;
                color: white;
                padding: 6px 12px;
            }

            .banner {
                background-color: #e6d4c1;
                border-radius: 10px;
                padding: 40px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }

            .banner h1 {
                color: #3b2f2f;
                font-weight: 600;
            }

            .banner p {
                color: #5a4740;
            }

            .btn-primary {
                background-color: #a47148;
                border: none;
            }

            .btn-primary:hover {
                background-color: #8b5e34;
            }

            .card {
                border: none;
                background-color: #fffaf4;
                border-radius: 15px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .card:hover {
                transform: scale(1.05);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            }

            .card-title {
                color: #3b2f2f;
                font-weight: 600;
            }

            .card-text {
                color: #5b4a3f;
            }

            footer {
                background-color: #4b2e05;
            }

            footer p {
                color: #e7c7a1;
            }
        </style>
    </head>

    <body>

        <!-- 🔹 Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">☕ Coffee Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php" target="_blank">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php" target="_blank">Contact</a></li>

                        <!-- 🔍 Search Form -->
                        <li class="nav-item ms-3">
                            <form class="d-flex search-bar" method="GET" action="index.php">
                                <input class="form-control me-2" type="search" name="search" placeholder="Cari kopi..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                                <button class="btn btn-sm" type="submit">Cari</button>
                            </form>
                        </li>

                        <!-- 🔐 Tombol Login -->
                        <li class="nav-item">
                            <a class="btn btn-outline-light ms-3" href="admin/login.php" target="_blank"
                                style="border-radius: 20px; padding: 6px 14px;">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- 🔹 Banner -->
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center banner">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <img class="img-fluid rounded" src="images/arabica.jpg" alt="Coffee Banner">
                </div>
                <div class="col-lg-5">
                    <h1>Selamat Datang di Coffee Store</h1>
                    <p>Temukan berbagai varian kopi lokal premium yang siap menemani harimu ☕. Nikmati aroma khas,
                        cita rasa hangat, dan momen santai yang tak terlupakan.</p>
                    <a class="btn btn-primary" href="pesan.php" target="_blank">Pesan Sekarang</a>
                </div>
            </div>
        </div>

        <!-- 🔹 Card Produk -->
        <div class="container my-5">
            <h2 class="text-center mb-4" style="color:#4b2e05;">Produk Kopi Unggulan Kami</h2>
            <div class="row gx-4 gx-lg-5">
                <?php
                // Logika pencarian
                $where = "";
                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    $keyword = $koneksi->real_escape_string($_GET['search']);
                    $where = "WHERE nama_produk LIKE '%$keyword%' OR kategori LIKE '%$keyword%'";
                }

                $query = "SELECT * FROM produk_kopi $where ORDER BY id_produk DESC";
                $result = $koneksi->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <div class="col-md-4 mb-5">
                            <div class="card h-100 text-center">
                                <img src="' . $row['gambar'] . '" class="card-img-top rounded-top" alt="' . $row['nama_produk'] . '">
                                <div class="card-body">
                                    <h4 class="card-title">' . $row['nama_produk'] . '</h4>
                                    <p class="card-text">' . $row['deskripsi'] . '</p>
                                    <h6 class="fw-bold text-success">Rp ' . number_format($row['harga'], 0, ',', '.') . '</h6>
                                </div>
                                <div class="card-footer">
                                    <a href="pesan.php" target="_blank" class="btn btn-sm btn-primary">Beli Sekarang</a>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo "<p class='text-center text-muted'>Tidak ada produk yang cocok dengan pencarian kamu.</p>";
                }
                ?>
            </div>
        </div>

        <!-- 🔹 Form Komentar -->
        <div class="container my-5">
            <h3 class="text-center mb-4" style="color:#4b2e05;">💬 Berikan Komentar Anda</h3>

            <?php
            // Proses kirim komentar
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kirim_komentar'])) {
                $nama = $koneksi->real_escape_string($_POST['nama']);
                $isi = $koneksi->real_escape_string($_POST['isi']);

                $query = "INSERT INTO komentar (nama, isi) VALUES ('$nama', '$isi')";
                if ($koneksi->query($query)) {
                    echo '<div class="alert alert-success text-center">Komentar berhasil dikirim!</div>';
                } else {
                    echo '<div class="alert alert-danger text-center">Gagal mengirim komentar.</div>';
                }
            }
            ?>

            <!-- Form Input -->
            <form method="POST" class="bg-white p-4 rounded shadow-sm" style="max-width:600px;margin:auto;">
                <div class="mb-3">
                    <label class="form-label">Nama Anda</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Anda" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Komentar</label>
                    <textarea name="isi" class="form-control" rows="4" placeholder="Tulis komentar Anda..." required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" name="kirim_komentar" class="btn btn-primary">Kirim Komentar</button>
                </div>
            </form>
        </div>

        <!-- 🔹 Daftar Komentar -->
        <div class="container my-5">
            <h4 class="text-center mb-4" style="color:#4b2e05;">🗨️ Komentar Pengunjung</h4>

            <?php
            $komentar = $koneksi->query("SELECT * FROM komentar ORDER BY tanggal DESC");

            if ($komentar->num_rows > 0) {
                while ($row = $komentar->fetch_assoc()) {
                    echo '
            <div class="card mb-3 shadow-sm" style="max-width:700px;margin:auto;background:#fffaf4;">
                <div class="card-body">
                    <h5 class="card-title" style="color:#4b2e05;">' . htmlspecialchars($row['nama']) . '</h5>
                    <p class="card-text">' . htmlspecialchars($row['isi']) . '</p>
                    <p class="text-muted small">' . date('d M Y, H:i', strtotime($row['tanggal'])) . '</p>
                </div>
            </div>';
                }
            } else {
                echo "<p class='text-center text-muted'>Belum ada komentar. Jadilah yang pertama!</p>";
            }
            ?>
        </div>


        <!-- 🔹 Footer -->
        <footer class="py-4 text-center">
            <p>© 2025 Coffee Store Indonesia | “Brew Your Story in Every Cup”</p>
        </footer>

    </body>

    </html>