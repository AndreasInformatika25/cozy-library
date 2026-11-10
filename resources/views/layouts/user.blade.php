<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bookly - Sewa Buku Digital')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
            padding-bottom: 40px;
            color: var(--text-dark);
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
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid #eee;
            padding-top: 16px;
            padding-bottom: 16px;
            margin-bottom: 24px;
            transition: box-shadow 0.3s;
        }
        .navbar-brand img { width: 128px; }

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
        .nav-link:hover { color: var(--brand) !important; }
        .nav-link.active {
            color: var(--text-dark) !important;
            font-weight: 600;
        }

        /* Utility */
        .section-title {
            font-size: clamp(26px, 4vw, 38px);
            color: var(--text-dark);
            line-height: 1.25;
            margin-bottom: 8px;
        }
        .section-divider {
            width: 50px;
            margin: 10px auto 24px;
            border: 0;
            border-top: 3px solid var(--brand);
            opacity: 1;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
        <div class="container-fluid page-wrap">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/Logo.png') }}" alt="Bookly">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="d-flex align-items-center gap-3 py-3 py-lg-0 ms-auto">
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-custom rounded-3 dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown">
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

    <!-- KONTEN DINAMIS -->
    @yield('content')

    <!-- Popper + Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html>