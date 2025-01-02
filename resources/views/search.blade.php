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
    <!-- Header -->
    <header class="custom-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="image/News.png" class="me-3">
            </div>
            <nav class="nav">
                <a class="deactive" href="{{ route('home') }}">Home</a>
                <a class="deactive" href="{{ route('news') }}">News</a>
                <a class="deactive" href="{{ route('domestic') }}">Domestic</a>
            </nav>
            <form class="d-flex ms-3" method="GET" action="{{ route('search') }}">
                <input class="form-control me-2" name="q" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-light" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container-fluid px-5 my-4" style="padding-top: 75px;">
    <div class="row">
        @if(request('q'))
            <div class="col-12">
                <h2 class="mb-4">Search Results for "{{ request('q') }}"</h2>
                @if($news->isNotEmpty())
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
                    <div class="mt-4">
                        {{ $news->links() }}
                    </div>
                @else
                    <p>No results found for "{{ request('q') }}"</p>
                @endif
            </div>
        @else
            <!-- Tampilkan konten utama jika tidak ada pencarian -->
            <div class="col-12">
                <h2 class="mb-4">Latest News</h2>
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
        @endif
    </div>
</main>


<footer style="background-color: #f8f9fa; padding: 20px 0; border-top: 1px solid #ddd;">
    <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
        <!-- Brand Section -->
        <div style="margin-bottom: 10px;">
            <img src="{{ asset('image/News.png') }}" alt="Paw Pet Care Logo" style="width: 60px; height: auto; margin-bottom: 10px;">
            <h10>Paw Pet Care</h10>
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
