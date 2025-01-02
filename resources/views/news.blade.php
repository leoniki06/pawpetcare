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
        .list-group-item {
            width: 100%;
            background-color:rgb(215, 193, 179);
        }

        .list-group-item img {
            object-fit: cover;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="custom-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <div class="d-flex align-items-center">
                <img src="image/News.png" alt="WinNews Logo" class="me-3">
            </div>

            <!-- Navigation Links -->
            <nav class="nav">
                <a class="deactive" href="{{ route('home') }}">Home</a>
                <a class="deactive" href="{{ route('domestic') }}">Konsultasi</a>
                <a class="active" href="{{ route('news') }}">Blog</a>
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
        <div class="row justify-content-center">

    <!-- Main Content -->
    <main class="container-fluid px-5 my-4" style="padding-top: 75px;">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Diseases</h2>
                <div class="list-group w-100">
                    @foreach ($news as $item)
                        <div class="list-group-item d-flex justify-content-between align-items-center border rounded mb-3 p-3">
                            <div class="flex-grow-1">
                                <a href="{{ route('detail', $item->id) }}" class="text-decoration-none text-dark">
                                    <h5 class="fw-bold mb-1">{{ $item->title }}</h5>
                                    <p>{{ Str::limit($item->content, 100) }}</p>
                                    <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
                                </a>
                            </div>
                            <img src="{{ $item->image }}" alt="{{ $item->title }}" class="ms-3" style="width: 80px; height: 80px; object-fit: cover;">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>


</body>
</html>
