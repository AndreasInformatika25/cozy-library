<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>こーじー Library</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand: #C49A80;
            --brand-hover: #a87e64;
            --text-dark: #1F1F1F;
            --text-muted: #666;

            --page-px: 16px;
        }
        @media (min-width: 768px)  { :root { --page-px: 48px; } }
        @media (min-width: 992px)  { :root { --page-px: 96px; } }
        @media (min-width: 1400px) { :root { --page-px: 256px; } }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            margin: 0;
            padding-bottom: 40px; /* Tidak perlu padding top karena navbar sticky */
        }

        .page-wrap {
            padding-left: var(--page-px);
            padding-right: var(--page-px);
        }

        /* ============ NAVBAR STICKY ============ */
        .navbar-fixed-top {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: rgba(255, 255, 255, 0.95); /* Putih agak transparan */
            backdrop-filter: blur(8px); /* Efek blur kaca */
            border-bottom: 1px solid #eee;
            padding-top: 16px;
            padding-bottom: 16px;
            transition: box-shadow 0.3s;
        }

        .navbar-brand img {
            width: 128px;
        }

        /* Jarak anchor agar tidak tertutup navbar */
        #category, #all-books {
            scroll-margin-top: 100px;
        }

        /* Tombol coklat */
        .btn-custom {
            background-color: var(--brand);
            color: #fff;
            border: none;
            padding: 10px 24px;
            font-weight: 500;
        }
        .btn-custom:hover,
        .btn-custom:focus {
            background-color: var(--brand-hover);
            color: #fff;
        }

        /* Navigasi */
        .nav-link {
            font-size: 14px;
            color: var(--text-muted);
            font-weight: 500;
        }
        .nav-link:hover {
            color: var(--brand) !important;
        }
        .nav-link.active {
            color: var(--text-dark) !important;
            font-weight: 600;
        }

        /* Hero */
        .hero {
            background-color: #f3efe6;
            width: 100%;
            padding-top: 64px;
            padding-bottom: 64px;
            padding-left: var(--page-px);
            padding-right: var(--page-px);
            margin-bottom: 64px;
        }

        .hero-title {
            font-size: clamp(32px, 5vw, 48px);
            line-height: 1.2;
            color: var(--text-dark);
            margin-bottom: 20px;
        }
        .hero-text {
            color: var(--text-muted);
            font-size: 15px;
            margin-bottom: 30px;
        }
        .hero-stats h3 {
            font-size: 24px;
            margin-bottom: 2px;
            color: var(--text-dark);
            font-weight: 700;
        }
        .hero-stats p {
            font-size: 13px;
            color: var(--text-muted);
            margin: 0;
        }
        .hero-img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 20px;
        }

        /* Garis di bawah judul section */
        .section-divider {
            width: 50px;
            margin: 10px auto;
            border: 0;
            border-top: 3px solid var(--brand);
            opacity: 1;
        }

        /* ---------- SLIDER ---------- */
        .carousel-container {
            --per-view: 2;
            --gap: 24px;
        }
        @media (min-width: 576px)  { .carousel-container { --per-view: 3; } }
        @media (min-width: 992px)  { .carousel-container { --per-view: 5; } }
        @media (min-width: 1400px) { .carousel-container { --per-view: 6; } }

        .slider-viewport {
            overflow: hidden;
            padding: 8px 4px;
        }
        .slider-track {
            display: flex;
            flex-wrap: nowrap;
            gap: var(--gap);
        }
        .slider-item {
            flex: 0 0 calc((100% - var(--gap) * (var(--per-view) - 1)) / var(--per-view));
            min-width: 0;
        }

        .book-card {
            height: 100%;
            padding: 8px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .book-cover,
        .book-cover-empty {
            width: 100%;
            aspect-ratio: 2 / 3;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .book-cover { object-fit: cover; display: block; }
        .book-cover-empty {
            background: #e9e4df;
            color: #8a7f77;
            font-size: 14px;
        }

        .author-text {
            font-size: 12px;
            font-weight: 300;
            color: var(--text-muted);
            overflow: hidden;
        }
        .book-title {
            font-size: 15px;
            color: var(--text-dark);
            font-weight: 500;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: calc(1.3em * 2);
        }

        /* Tombol panah */
        .btn-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 3;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid #ddd;
            background: #fff;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
            transition: background 0.2s, color 0.2s;
        }
        .btn-arrow:hover {
            background: var(--brand);
            color: #fff;
            border-color: var(--brand);
        }
        .btn-arrow.btn-left  { left: -8px; }
        .btn-arrow.btn-right { right: -8px; }

        /* Select sort selaras brand */
        #sortBooks {
            border-radius: 10px;
            border-color: #ddd;
            font-size: 13px;
            padding: 8px 36px 8px 14px;
            color: var(--text-dark);
            cursor: pointer;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        #sortBooks:focus {
            border-color: var(--brand);
            box-shadow: 0 0 0 3px rgba(196, 154, 128, 0.2);
        }

        .dropdown-item:hover, 
        .dropdown-item:focus {
            background-color: var(--brand-soft-2, #faf6f0) !important;
            color: var(--brand) !important;
        }

        .dropdown-item.text-danger:hover {
            background-color: #fce4d6 !important;
            color: #dc3545 !important;
        }
    </style>
</head>
<body>

    <!-- NAVBAR FIXED -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
        <div class="container-fluid page-wrap">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="img/Logo.png" alt="こーじー Library">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav gap-lg-3 mx-lg-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#category">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="#all-books">Semua Buku</a></li>
                </ul>

                <div class="d-flex align-items-center gap-3 py-3 py-lg-0">
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-custom rounded-3 dropdown-toggle d-flex align-items-center gap-2"
                                    type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle"></i>
                                <span>{{ Auth::user()->name }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2">
                                @if(Auth::user()->role === 'pekerja' || Auth::user()->role === 'admin')
                                    <li>
                                        <a class="dropdown-item fw-bold" style="color: var(--brand);" href="{{ url('/admin') }}">
                                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard Admin
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                                
                                <li>
                                    <a class="dropdown-item small" href="{{ route('borrow.history') }}">
                                        <i class="fas fa-clock-rotate-left me-2"></i> Riwayat Pinjam Saya
                                    </a>
                                </li>
                                
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="dropdown-item small text-danger">
                                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-decoration-none text-dark fw-medium small">Log In</a>
                        <a href="{{ Route::has('register') ? route('register') : '#' }}" class="btn btn-custom rounded-3">Sign Up</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <div class="hero">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <h1 class="hero-title">Find Your Next Story, One Book at a Time.</h1>
                <p class="hero-text pe-lg-5">
                    Discover a cozy space filled with stories, knowledge, and inspiration. Explore our collection and find the perfect book for your next reading journey.
                </p>

                <div class="d-flex align-items-center gap-4 mb-5">
                    <a href="#all-books" class="btn btn-custom rounded-3 px-4 py-2">Explore Books</a>
                    <a href="{{ route('how.to.borrow') }}" class="text-decoration-none text-dark fw-semibold small">
                        How to Borrow
                    </a>
                </div>

                <!-- DATA STATISTIK NYATA -->
                <div class="d-flex gap-4 gap-md-5 hero-stats">
                    <div>
                        <h3>{{ number_format($totalBuku ?? 0, 0, ',', '.') }}</h3>
                        <p>Buku Tersedia</p>
                    </div>
                    <div>
                        <h3>{{ number_format($totalUser ?? 0, 0, ',', '.') }}</h3>
                        <p>Anggota Aktif</p>
                    </div>
                    <div>
                        <h3>{{ number_format($totalKategori ?? 0, 0, ',', '.') }}</h3>
                        <p>Kategori Buku</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <img src="img/Hero.jpg" alt="Cozy Library" class="hero-img">
            </div>
        </div>
    </div>

    <!-- KATEGORI DINAMIS -->
    <div id="category" class="page-wrap">
        @foreach($semuaKategori as $kategori)
            @if($kategori->books->count() > 0)
                <section class="mb-5 carousel-container">
                    <h2 class="h4 text-center fw-bold mb-0">Buku {{ $kategori->nama_kategori }} Terbaru</h2>
                    <hr class="section-divider">

                    <div class="position-relative mt-3">
                        <button type="button" class="btn-arrow btn-left" aria-label="Geser ke kiri">&#10094;</button>

                        <div class="slider-viewport">
                            <div class="slider-track">
                                @foreach ($kategori->books as $item)
                                    <div class="slider-item">
                                        <a href="{{ route('book.detail', $item->id) }}" class="text-decoration-none d-block h-100">
                                            <div class="book-card">
                                                @if($item->cover)
                                                    <img src="{{ asset('storage/' . $item->cover) }}"
                                                        class="book-cover"
                                                        alt="Cover buku {{ $item->judul }}"
                                                        loading="lazy">
                                                @else
                                                    <div class="book-cover-empty d-flex align-items-center justify-content-center">
                                                        No Cover
                                                    </div>
                                                @endif
                                                <div class="author-text">{{ $item->penulis }}</div>
                                                <div class="book-title" title="{{ $item->judul }}">{{ $item->judul }}</div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="button" class="btn-arrow btn-right" aria-label="Geser ke kanan">&#10095;</button>
                    </div>
                </section>
            @endif
        @endforeach
    </div>

    <!-- SEMUA BUKU -->
    @if($semuaBuku->count() > 0)
        <div id="all-books" class="page-wrap">
            <section class="mb-5">
                <h2 class="h4 text-center fw-bold mb-0">Semua Buku Tersedia</h2>
                <hr class="section-divider">

                <p class="text-center text-muted small mb-4 mt-3">
                    Total {{ $semuaBuku->count() }} buku dalam koleksi kami
                </p>

                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3 mt-3">
                    <p class="text-muted small mb-0">
                        Menampilkan <strong id="bookCount">{{ $semuaBuku->count() }}</strong> buku
                    </p>

                    <div class="d-flex align-items-center gap-2">
                        <label for="sortBooks" class="text-muted small mb-0">Urutkan:</label>
                        <select id="sortBooks" class="form-select form-select-sm" style="width: auto; min-width: 180px;">
                            <option value="az" selected>A → Z</option>
                            <option value="za">Z → A</option>
                            <option value="newest">Terbaru</option>
                            <option value="oldest">Terlama</option>
                        </select>
                    </div>
                </div>

                <div class="row g-3 g-md-4" id="allBooksGrid">
                    @foreach($semuaBuku as $buku)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 book-grid-item"
                            data-title="{{ Str::lower($buku->judul) }}"
                            data-created="{{ $buku->created_at->timestamp }}"
                            data-id="{{ $buku->id }}">
                            <a href="{{ route('book.detail', $buku->id) }}"
                            class="text-decoration-none d-block h-100">
                                <div class="book-card">
                                    @if($buku->cover)
                                        <img src="{{ asset('storage/' . $buku->cover) }}"
                                            class="book-cover"
                                            alt="Cover {{ $buku->judul }}"
                                            loading="lazy">
                                    @else
                                        <div class="book-cover-empty d-flex align-items-center justify-content-center">
                                            No Cover
                                        </div>
                                    @endif
                                    <div class="author-text">{{ $buku->penulis }}</div>
                                    <div class="book-title" title="{{ $buku->judul }}">{{ $buku->judul }}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    @endif

    <!-- Scripts -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const DURATION = 400; // ms, samakan dengan durasi transition

        document.querySelectorAll('.carousel-container').forEach(function (carousel) {
            const viewport = carousel.querySelector('.slider-viewport');
            const track    = carousel.querySelector('.slider-track');
            const btnLeft  = carousel.querySelector('.btn-left');
            const btnRight = carousel.querySelector('.btn-right');

            if (!viewport || !track || !btnLeft || !btnRight) return;

            let isAnimating = false;

            function getStep() {
                const item = track.firstElementChild;
                if (!item) return 0;
                const gap = parseFloat(getComputedStyle(track).columnGap) || 0;
                return item.offsetWidth + gap;
            }

            function updateArrows() {
                const overflowing = track.scrollWidth > viewport.clientWidth + 1;
                btnLeft.classList.toggle('d-none', !overflowing);
                btnRight.classList.toggle('d-none', !overflowing);
            }

            btnRight.addEventListener('click', function () {
                if (isAnimating) return;
                const step = getStep();
                if (!step) return;
                isAnimating = true;

                track.style.transition = 'transform ' + DURATION + 'ms ease-in-out';
                track.style.transform = 'translateX(-' + step + 'px)';

                setTimeout(function () {
                    track.style.transition = 'none';
                    track.appendChild(track.firstElementChild);
                    track.style.transform = 'translateX(0)';
                    isAnimating = false;
                }, DURATION);
            });

            btnLeft.addEventListener('click', function () {
                if (isAnimating) return;
                const step = getStep();
                if (!step) return;
                isAnimating = true;

                track.style.transition = 'none';
                track.prepend(track.lastElementChild);
                track.style.transform = 'translateX(-' + step + 'px)';

                void track.offsetWidth; 

                track.style.transition = 'transform ' + DURATION + 'ms ease-in-out';
                track.style.transform = 'translateX(0)';

                setTimeout(function () {
                    isAnimating = false;
                }, DURATION);
            });

            updateArrows();
            window.addEventListener('resize', updateArrows);
        });

        const grid = document.getElementById('allBooksGrid');
        const select = document.getElementById('sortBooks');
        const countEl = document.getElementById('bookCount');

        if (!grid || !select) return;

        const originalItems = Array.from(grid.querySelectorAll('.book-grid-item'));

        function sortBooks(mode) {
            let items = originalItems.slice();

            switch (mode) {
                case 'az':
                    items.sort((a, b) => a.dataset.title.localeCompare(b.dataset.title, 'id'));
                    break;
                case 'za':
                    items.sort((a, b) => b.dataset.title.localeCompare(a.dataset.title, 'id'));
                    break;
                case 'oldest':
                    items.sort((a, b) => Number(a.dataset.created) - Number(b.dataset.created));
                    break;
                case 'newest':
                default:
                    items.sort((a, b) => Number(b.dataset.created) - Number(a.dataset.created));
                    break;
            }

            const fragment = document.createDocumentFragment();
            items.forEach(item => fragment.appendChild(item));
            grid.appendChild(fragment);

            if (countEl) countEl.textContent = items.length;
        }

        select.addEventListener('change', function () {
            sortBooks(this.value);
        });

        sortBooks(select.value);
    });
    </script>

    <!-- Popper + Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>