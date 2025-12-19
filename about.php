<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tentang Kami - Coffee Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* 🌿 Tema Coffee Shop */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f3ef;
            color: #3b2f2f;
        }

        /* 🔹 Navbar */
        .navbar {
            background-color: #4b2e05 !important;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            color: #f1d9b7 !important;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .nav-link {
            color: #f3e5d0 !important;
        }

        .nav-link:hover {
            color: #c89b6d !important;
        }

        /* 🔹 Hero Banner */
        .hero {
            background: url('images/coffee_shop_bg.jpg') center/cover no-repeat;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            position: relative;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #f1d9b7;
        }

        .hero p {
            font-size: 1.2rem;
            color: #f3e5d0;
        }

        /* 🔹 About Section */
        .about-section {
            background-color: #fffaf4;
            border-radius: 15px;
            padding: 50px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin-top: -80px;
        }

        .about-section img {
            border-radius: 15px;
        }

        .about-section h2 {
            color: #4b2e05;
            font-weight: 700;
        }

        .about-section p {
            color: #5a4740;
        }

        /* 🌿 Fade-in Animation */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* 🔹 Footer */
        footer {
            background-color: #4b2e05;
            color: #e7c7a1;
        }

        footer a {
            color: #f1d9b7;
            text-decoration: none;
        }

        footer a:hover {
            color: #fff;
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
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 🔹 Hero Banner -->
    <section class="hero">
        <div class="hero-content">
            <h1>Tentang Coffee Store</h1>
            <p>"Setiap cangkir kopi punya cerita — dan kami ingin menjadi bagian dari ceritamu."</p>
        </div>
    </section>

    <!-- 🔹 About Section -->
    <div class="container about-section mt-5">
        <div class="row align-items-center fade-in">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="images/robusta.jpg" alt="Coffee Beans" class="img-fluid shadow-lg">
            </div>
            <div class="col-md-6">
                <h2>Siapa Kami?</h2>
                <p>
                    Berdiri sejak tahun <strong>2020</strong>, Coffee Store hadir untuk membawa cita rasa kopi Nusantara ke seluruh penjuru negeri.
                    Kami bekerja sama dengan petani kopi lokal dari berbagai daerah — mulai dari Aceh Gayo hingga Toraja —
                    demi menghadirkan kualitas dan aroma terbaik dalam setiap seduhan.
                </p>
                <p>
                    Kami percaya, secangkir kopi bukan sekadar minuman — tapi <em>sebuah pengalaman</em> yang membawa ketenangan,
                    kebersamaan, dan semangat baru setiap harinya.
                </p>
            </div>
        </div>

        <!-- 🌿 Galeri Coffee Shop -->
        <div class="row text-center mt-5 fade-in">
            <h3 class="mb-4" style="color:#4b2e05;">Galeri Coffee Store</h3>

            <div class="col-md-4 mb-4">
                <img src="images/store_interior.jpg" class="img-fluid rounded shadow-sm" alt="Interior Toko">
                <p class="mt-2">Suasana Nyaman Coffee Store</p>
            </div>

            <div class="col-md-4 mb-4">
                <img src="images/barista.jpg" class="img-fluid rounded shadow-sm" alt="Barista Kami">
                <p class="mt-2">Tim Barista Profesional</p>
            </div>

            <div class="col-md-4 mb-4">
                <img src="images/coffee_machine.jpg" class="img-fluid rounded shadow-sm" alt="Mesin Kopi Modern">
                <p class="mt-2">Peralatan Kopi Modern</p>
            </div>
        </div>
    </div>

    <!-- 🔹 Footer -->
    <footer class="py-4 text-center mt-5">
        <p>© 2025 Coffee Store Indonesia | <a href="#">Brew Your Story in Every Cup</a></p>
    </footer>

    <!-- ✨ Script Fade-in saat discroll -->
    <script>
        const faders = document.querySelectorAll('.fade-in');

        const appearOptions = {
            threshold: 0.2,
            rootMargin: "0px 0px -50px 0px"
        };

        const appearOnScroll = new IntersectionObserver(function(entries, observer) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            });
        }, appearOptions);

        faders.forEach(fader => {
            appearOnScroll.observe(fader);
        });
    </script>

</body>

</html>