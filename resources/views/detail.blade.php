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
</head>
<body>
    <header class="custom-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <div class="d-flex align-items-center">
                <img src="{{ asset('image/News.png') }}"  alt="WinNews Logo" class="me-3">
            </div>

            <!-- Navigation Links -->
            <nav class="nav">
                <a class="deactive" href="{{ route('home') }}">Home</a>
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

    <main class="container my-4" style="padding-top: 75px;">
        <div class="row justify-content-center">

<main class="container my-4" style="padding-top: 75px;">
    <!-- Konten Utama -->
    <section class="col-md-8">
        <div class="card mb-4">
            @if ($news->image)
                <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="card-img-top">
            @endif
            <div class="card-body">
                <h5 class="card-title fw-bold">
                    {{ $news->title }}
                </h5>
                <p class="card-text">
                    {{ $news->content }}
                </p>
            </div>
        </div>
    </section>

    <!-- Sidebar (Latest News) -->
    <aside class="col-md-4">
        <h3 class="mb-3">Recent Articles</h3>
        <ul class="list-group list-group-flush">
            @foreach ($latestNews as $item)
                <li class="list-group-item">
                    <a href="{{ route('detail', $item->id) }}" class="text-decoration-none text-dark">
                        {{ $item->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </aside>
</main>



</body>
</html>
