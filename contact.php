<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Anggota - Coffee Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f3ef;
            font-family: 'Poppins', sans-serif;
        }

        h2 {
            text-align: center;
            margin: 40px 0;
            color: #5a3e36;
            font-weight: 700;
        }

        .profile-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 25px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .profile-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid #8b5e3c;
        }

        .profile-card h5 {
            color: #4a2e19;
            font-weight: bold;
        }

        .profile-card p {
            color: #6f4e37;
            font-size: 0.95rem;
            margin: 3px 0;
        }

        .quotes {
            font-style: italic;
            color: #444;
            font-size: 0.9rem;
            margin-top: 10px;
        }

        .social-icons a {
            color: #6f4e37;
            margin: 0 8px;
            font-size: 1.2rem;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: #c49b63;
        }

        footer {
            background: #3e2723;
            color: #fff;
            text-align: center;
            padding: 15px 0;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <h2>☕ Profil Anggota Coffee Store Team</h2>
        <div class="row g-4 justify-content-center">

            <!-- 👤 Owner  -->
            <div class="col-md-4">
                <div class="profile-card">
                    <img src="images/profil2.jpg" alt="Profil Anggota 2">
                    <h5>Alfadhil Hafish</h5>
                    <p><strong>NIM:</strong> 2523168</p>
                    <p><strong>No. HP:</strong> 085274870215</p>
                    <p><strong>Alamat:</strong> Solok</p>
                    <p class="quotes">"Aroma kopi adalah bahasa universal kebahagiaan."</p>
                    <div class="social-icons">
                        <a href="https://instagram.com/alfdhl12" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://wa.me/6285274870215" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <footer>
                <p>© 2025 Coffee Store Team — Nikmati Kehangatan Dalam Setiap Cangkir ☕</p>
            </footer>

</body>

</html>