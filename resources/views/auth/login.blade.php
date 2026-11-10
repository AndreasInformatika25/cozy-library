<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Bookly</title>

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
            padding: 24px 0 40px;
            color: var(--text-dark);
            min-height: 100vh;
        }

        .page-wrap {
            padding-left: var(--page-px);
            padding-right: var(--page-px);
        }

        /* Logo */
        nav { margin-bottom: 20px; }
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
        .nav-link.active {
            color: var(--text-dark) !important;
            font-weight: 600;
        }

        /* Section title Playfair */
        .section-title {
            font-size: clamp(26px, 4vw, 36px);
            color: var(--text-dark);
            line-height: 1.25;
            margin-bottom: 8px;
        }

        /* Garis di bawah judul */
        .section-divider {
            width: 50px;
            margin: 10px auto 0;
            border: 0;
            border-top: 3px solid var(--brand);
            opacity: 1;
        }

        /* Card login */
        .auth-card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            padding: 40px;
            max-width: 480px;
            margin: 0 auto;
        }
        @media (max-width: 575.98px) {
            .auth-card { padding: 28px 22px; }
        }

        /* Label & input */
        .form-label {
            font-size: 14px;
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 6px;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 14px;
            border: 1px solid #ddd;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-control:focus {
            border-color: var(--brand);
            box-shadow: 0 0 0 3px rgba(196, 154, 128, 0.2);
        }
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        .form-control.is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.15);
        }
        .invalid-feedback {
            font-size: 12px;
        }

        /* Input group dengan ikon */
        .input-icon-group {
            position: relative;
        }
        .input-icon-group .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 14px;
            pointer-events: none;
            transition: color 0.2s;
        }
        .input-icon-group .form-control {
            padding-left: 42px;
        }
        .input-icon-group:focus-within .input-icon {
            color: var(--brand);
        }

        /* Remember me */
        .form-check-input:checked {
            background-color: var(--brand);
            border-color: var(--brand);
        }
        .form-check-input:focus {
            border-color: var(--brand);
            box-shadow: 0 0 0 3px rgba(196, 154, 128, 0.2);
        }
        .form-check-label {
            font-size: 13px;
            color: var(--text-muted);
        }

        /* Link */
        a.link-brand {
            color: var(--brand);
            text-decoration: none;
            font-weight: 500;
            font-size: 13px;
        }
        a.link-brand:hover {
            color: var(--brand-hover);
            text-decoration: underline;
        }

        /* Tombol submit full width */
        .btn-submit {
            width: 100%;
            padding: 13px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 500;
        }

        /* Divider "atau" */
        .divider-text {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--text-muted);
            font-size: 12px;
            margin: 20px 0;
        }
        .divider-text::before,
        .divider-text::after {
            content: '';
            flex: 1;
            border-top: 1px solid #eee;
        }

        .footer-text {
            text-align: center;
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 24px;
        }
    </style>
</head>
<body>

    <!-- NAVBAR (sama seperti index) -->
    <div class="page-wrap">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="container-fluid p-0">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/Logo.png') }}" alt="Bookly">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </div>
            </div>
        </nav>
    </div>

    <!-- FORM LOGIN -->
    <div class="page-wrap">
        <div class="row justify-content-center mt-4 mt-md-5">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">

                <div class="text-center mb-4">
                    <h1 class="section-title">Selamat Datang Kembali</h1>
                    <hr class="section-divider">
                    <p class="text-muted small mt-3 mb-0">
                        Masuk untuk melanjutkan petualangan membaca kamu
                    </p>
                </div>

                <div class="auth-card">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-icon-group">
                                <i class="fas fa-envelope input-icon"></i>
                                <input id="email"
                                       type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="nama@email.com"
                                       required
                                       autocomplete="email"
                                       autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-icon-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input id="password"
                                       type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password"
                                       placeholder="Masukkan password"
                                       required
                                       autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember + Lupa password -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Ingat saya
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="link-brand" href="{{ route('password.request') }}">
                                    Lupa password?
                                </a>
                            @endif
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn btn-custom btn-submit">
                            <i class="fas fa-sign-in-alt me-2"></i> Login
                        </button>

                        @if (Route::has('register'))
                            <div class="divider-text">atau</div>
                            <div class="footer-text">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="link-brand">Daftar sekarang</a>
                            </div>
                        @endif
                    </form>
                </div>

                <!-- Link kembali -->
                <div class="text-center mt-4">
                    <a href="{{ url('/') }}" class="link-brand">
                        <i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Popper + Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>