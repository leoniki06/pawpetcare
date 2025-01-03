<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawPetCare</title>
    <link rel="icon" type="image/png" href="{{ asset('image/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/css/app.css')
    <style>
         .btn-primary, .card {
            background-color: #8d6e63;
        }
        .btn-primary {
            border-color: #d2b48c;
        }
        .btn-primary:hover {
            background-color: #c3a582; /* slightly darker brown for hover effect */
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="custom-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="image/News.png" alt="WinNews Logo" class="me-3">
            </div>
            <nav class="nav">
                <a class="deactive" href="{{ route('home') }}">Home</a>
                <a class="active" href="{{ route('domestic') }}">Konsultasi</a>
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

    <!-- Main Content -->
    <section class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title">Form Pendaftaran Konsultasi</h4>
                    <form method="POST" enctype="multipart/form-data" action="{{ route('konsultasi.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                            <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_hewan" class="form-label">Nama Hewan</label>
                            <input type="text" class="form-control" id="nama_hewan" name="nama_hewan" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto_hewan" class="form-label">Foto Hewan</label>
                            <input type="file" class="form-control" id="foto_hewan" name="foto_hewan">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori Hewan</label>
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="kategori_hewan_anjing" name="kategori_hewan" value="Anjing" required>
                                    <label class="form-check-label" for="kategori_hewan_anjing">Anjing</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="kategori_hewan_kucing" name="kategori_hewan" value="Kucing" required>
                                    <label class="form-check-label" for="kategori_hewan_kucing">Kucing</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ras " class="form-label">Ras</label>
                            <input type="text" class="form-control" id="ras" name="ras">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Jantan">Jantan</option>
                                <option value="Betina">Betina</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="usia_hewan" class="form-label">Usia Hewan</label>
                            <input type="number" class="form-control" id="usia_hewan" name="usia_hewan">
                        </div>
                        <div class="mb-3">
                            <label for="kontak" class="form-label">Kontak</label>
                            <input type="text" class="form-control" id="kontak" name="kontak">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer style="background-color: #f7e4d7; padding: 20px 0; border-top: 1px solid #ddd;">
        <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
            <div style="margin-bottom: 10px;">
                <img src="{{ asset('image/News.png') }}" alt="Paw Pet Care Logo" style="width: 60px; height: auto; margin-bottom: 10px;">
                <h10>Paw Pet Care</h10>
            </div>
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

    <!-- SweetAlert Script -->
    <script>
        function showSuccessMessage(event) {
            event.preventDefault(); // Prevent form from submitting
            Swal.fire({
                title: 'Form Konsultasi Berhasil',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }
    </script>
</body>
</html>
