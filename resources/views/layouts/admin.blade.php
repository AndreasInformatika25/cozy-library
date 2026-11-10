<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') | Bookly</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- (Opsional) Jika halaman butuh CSS tambahan seperti DataTables, taruh di sini -->
    @stack('styles')

    <style>
        :root {
            --brand: #C49A80;
            --brand-hover: #a87e64;
            --brand-soft: #f3efe6;
            --brand-soft-2: #faf6f0;
            --text-dark: #1F1F1F;
            --text-muted: #666;
            --border: #eee;
        }
        * { box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: #fff;
            color: var(--text-dark);
            margin: 0;
            display: flex;
            min-height: 100vh;
        }
        h1, h2, h3, .serif { color: var(--text-dark); }
        a { text-decoration: none; color: inherit; }
        svg {
            width: 22px; height: 22px;
            stroke: currentColor; fill: none;
            stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round;
        }

        /* ============ SIDEBAR ============ */
        .sidebar {
            width: 260px; flex-shrink: 0;
            background: #fff;
            border-right: 1px solid var(--border);
            padding: 28px 18px;
            display: flex; flex-direction: column;
            position: sticky; top: 0; height: 100vh;
        }
        .logo {
            display: flex; align-items: center; gap: 10px;
            margin-bottom: 36px; padding-left: 8px;
        }
        .logo img { width: 120px; }

        .nav a {
            display: flex; align-items: center; gap: 14px;
            padding: 12px 16px; border-radius: 12px;
            color: var(--text-muted); font-weight: 500;
            font-size: 14px; margin-bottom: 4px;
            transition: background .2s, color .2s;
        }
        .nav a:hover {
            background: var(--brand-soft-2);
            color: var(--text-dark);
        }
        .nav a.active {
            background: var(--brand-soft);
            color: var(--text-dark);
            font-weight: 600;
        }
        .nav a svg { color: var(--brand); flex-shrink: 0; }

        /* ============ MAIN ============ */
        .main { flex: 1; min-width: 0; }

        /* Topbar */
        .topbar {
            height: 72px;
            display: flex; align-items: center; justify-content: flex-end;
            gap: 18px; padding: 0 36px;
            border-bottom: 1px solid var(--border);
            background: #fff;
            position: sticky; top: 0; z-index: 10;
        }
        .avatar {
            width: 40px; height: 40px; border-radius: 50%;
            background: var(--brand); color: #fff;
            display: grid; place-items: center;
            font-weight: 600; font-size: 15px;
            transition: background .2s;
        }
        .avatar:hover { background: var(--brand-hover); }
        
        .dropdown-menu { padding: 8px; border-radius: 12px; }
        .dropdown-item {
            border-radius: 8px; padding: 8px 12px;
            font-size: 14px; font-weight: 500; transition: background .2s;
        }
        .dropdown-item:hover { background: var(--brand-soft-2); }

        .content { padding: 32px 64px; width: 100%; }

        /* ============ UTILITY & BUTTONS ============ */
        .btn-brand {
            display: inline-flex; align-items: center; gap: 10px;
            background: var(--brand); color: #fff;
            padding: 13px 26px; border-radius: 10px;
            font-weight: 500; font-size: 14px;
            border: none; cursor: pointer;
            transition: background .2s, transform .2s;
        }
        .btn-brand:hover { background: var(--brand-hover); color: #fff; transform: translateY(-1px); }
        
        /* Form Input */
        .form-label { font-size: 14px; font-weight: 500; color: var(--text-dark); }
        .form-control, .form-select {
            border-radius: 10px; padding: 10px 16px; font-size: 14px;
            border: 1px solid #ddd; transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--brand); box-shadow: 0 0 0 3px rgba(196, 154, 128, 0.2);
        }

        /* Responsive */
        @media (max-width: 760px) {
            .sidebar { display: none; }
            .topbar { padding: 0 16px; }
            .content { padding: 20px; }
        }
    </style>
</head>
<body>

    <!-- ============ SIDEBAR ============ -->
    <aside class="sidebar">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('img/Logo.png') }}" alt="Bookly">
        </a>

        <nav class="nav">
            <!-- Logika untuk menandai menu aktif secara otomatis -->
            <a href="{{ url('/admin') }}" class="{{ request()->is('admin') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><path d="M3 11l9-8 9 8v9a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1z"/></svg>
                Dashboard
            </a>
            <a href="{{ route('book.index') }}" class="{{ request()->routeIs('book.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><path d="M2 5.5S5 4 8 4s4 1 4 1 1-1 4-1 6 1.5 6 1.5V19s-3-1.5-6-1.5-4 1-4 1-1-1-4-1-6 1.5-6 1.5z"/><path d="M12 5v13.5"/></svg>
                Books
            </a>
            <a href="{{ route('category.index') }}" class="{{ request()->routeIs('category.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><path d="M3 6a2 2 0 0 1 2-2h4l2 2h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                Categories
            </a>
            <a href="{{ route('borrow.index') }}" class="{{ request()->routeIs('borrow.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><path d="M6 3h9l4 4v14H6z"/><path d="M14 3v5h5M9 13h7M9 17h5"/></svg>
                Borrowings
            </a>
            <a href="{{ route('member.index') }}" class="{{ request()->routeIs('member.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><circle cx="9" cy="8" r="3.5"/><path d="M2.5 20c0-3.5 3-6 6.5-6s6.5 2.5 6.5 6"/><circle cx="17" cy="9" r="2.5"/><path d="M17 14c2.5 0 4.5 1.8 4.5 5"/></svg>
                Users
            </a>
        </nav>
    </aside>

    <!-- ============ MAIN ============ -->
    <div class="main">
        <!-- Topbar -->
        <header class="topbar">
            <div class="d-none d-md-block text-dark fw-medium me-2">
                {{ Auth::user()->name }}
            </div>
            <div class="dropdown">
                <div class="avatar" id="adminMenu" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" aria-labelledby="adminMenu">
                    <li>
                        <div class="dropdown-header text-dark fw-bold" style="line-height: 1.2;">
                            {{ Auth::user()->name }}
                            <div class="small text-muted fw-normal mt-1">{{ Auth::user()->email }}</div>
                        </div>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ url('/') }}">
                            <i class="fas fa-home me-2 text-muted" style="width: 16px;"></i> Halaman Utama
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger fw-medium">
                                <i class="fas fa-sign-out-alt me-2" style="width: 16px;"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </header>

        <!-- KONTEN DINAMIS -->
        <main class="content">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- (Opsional) Jika halaman butuh script tambahan seperti DataTables -->
    @stack('scripts')
</body>
</html>