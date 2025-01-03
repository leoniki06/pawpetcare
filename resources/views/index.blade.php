<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawPetCare</title>
    <link rel="icon" type="image/png" href="{{ asset('image/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .nav a:hover { color: brown; }
        .main-content { margin-bottom: 50px; } /* Jarak antara konten dan footer */
        .sidebar { max-width: 250px; } /* Lebar sidebar */
    </style>
</head>
<body>
<header class="custom-header">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <div class="d-flex align-items-center">
            <img src="image/News.png" class="me-3" style="margin-right: 20px;">
        </div>
        <!-- Navigation Links -->
        <nav class="nav">
            <a class="active" href="{{ route('home') }}">Home</a>
            <a class="deactive" href="{{ route('domestic') }}">Konsultasi</a>
            <a class="deactive" href="{{ route('news') }}">Blog</a>
        </nav>
        <!-- Search Bar and Login Button -->
        <div class="d-flex align-items-center">
            <form class="d-flex me-3" method="GET" action="{{ route('search') }}">
                <input class="form-control me-2" name="q" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-light" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
            <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
        </div>
    </div>
</header>
<main class="d-flex justify-content-center align-items-start" style="min-height: calc(100vh - 150px);">
    <div class="row w-75" style="max-width: 3000px;">
        <!-- Konten Utama -->
        <section class="col-md-8 main-content mx-auto p-0 d-flex justify-content-center">
            <div class="card" style="width: 100%; background-color: #f7e4d7; padding: 20px;">
                <div class="card-body text-center p-0">
                    <img src="image/News.png" style="display: block; margin: 10px auto;" alt="Paw Pet Care Logo">
                    <h1 class="card-title fw-bold" style="margin: 10px 0;">Hi! Selamat Datang di PawPetCare's</h1>
                    <p style="margin: 10px 0; line-height: 1.5;">
                        PawPetCare adalah aplikasi berbasis web yang dirancang untuk memudahkan pemilik hewan peliharaan, khususnya anjing dan kucing, dalam mendapatkan informasi lengkap mengenai perawatan dan kesehatan hewan peliharaan mereka. Aplikasi ini menyediakan berbagai layanan, seperti tips perawatan, panduan kesehatan, konsultasi online, serta blog yang membahas topik-topik kesehatan hewan secara mendalam. Dengan desain yang user-friendly, aplikasi ini bertujuan menjadi solusi komprehensif untuk mendukung kesejahteraan hewan peliharaan.
                    </p>
                </div>
            </div>
        </section>
        <!-- Sidebar (Recent Articles) -->
        <aside class="col-md-4 sidebar d-flex justify-content-center" style="background-color: #f7e4d7;">
            <div>
                <h3 class="mb-3 text-center">Recent Articles..</h3>
                <!-- Artikel Pertama -->
                <div class="list-group-item" style="background-color: #f7e4d7;">
                    <a href="https://www.youtube.com/watch?v=Jfy76RuY324" class="text-decoration-none text-dark">
                        <img src="image/kesatu.jfif" alt="Artikel 1" style="width: 100%; height: auto; margin-bottom: 10px;">
                        5 Kesalahan Dog owner - Anjing jadi NAKAL
                    </a>
                </div>
                <!-- Artikel Kedua -->
                <div class="list-group-item" style="background-color: #f7e4d7;">
                    <a href="https://www.youtube.com/watch?v=eRQwSoyOqY4" class="text-decoration-none text-dark">
                        <img src="image/kedua.jfif" alt="Artikel 2" style="width: 100%; height: auto; margin-bottom: 10px;">
                        Cara Merawat Kucing untuk Pemula, Apa yang Harus Dilakukan Pertama Kali?
                    </a>
                </div>
                <!-- Artikel Ketiga -->
                <div class="list-group-item" style="background-color: #f7e4d7;">
                    <a href="https://www.youtube.com/watch?v=5DcZjQejPYI" class="text-decoration-none text-dark">
                        <img src="image/ketiga.jfif" alt="Artikel 3" style="width: 100%; height: auto; margin-bottom: 10px;">
                        MEMANDIKAN BAYI KUCING USIA 3 MINGGU, BEGINI CARANYA
                    </a>
                </div>
            </div>
        </aside>
    </div>
</main>
<footer style="background-color: #f7e4d7;  padding: 20px 0; border-top: 1px solid #ddd; margin-top: 20px">
    <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
        <!-- Brand Section -->
        <div style="margin-bottom: 10px;">
            <img src="{{ asset('image/News.png') }}" alt="Paw Pet Care Logo" style="width: 70px; height: auto; margin-bottom: 10px;">
            <h10><b>PawPetCare</b></h10>
        </div>
        <!-- Contact Section -->
        <div>
            <h5 class="text-dark mb-2">Contact Us:</h5>
            <p>
                <a href="https://wa.me/6285755113563" target="_blank" class="text-decoration-none text-dark">
                    <i class="bi bi-whatsapp me-2"></i>+62 857-5511-3563
                </a>
            </p>
            <p>
                <a href="https://instagram.com/pawpetcare_official" target="_blank" class="text-decoration-none text-dark">
                    <i class="bi bi-instagram me-2"></i>@pawpetcare_official
                </a>
            </p>
        </div>
    </div>
    <p class="text-center mt-3 text-muted">&copy; 2025 Paw Pet Care, All rights reserved</p>
</footer>
</body>
</html>
