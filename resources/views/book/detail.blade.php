@extends('layouts.user')

@section('title', 'Detail Buku - ' . $book->judul)

@push('styles')
<style>
    /* CSS Khusus Halaman Detail */
    .breadcrumb { font-size: 13px; margin-bottom: 24px; }
    .breadcrumb a { color: var(--text-muted); text-decoration: none; }
    .breadcrumb a:hover { color: var(--brand); }
    .breadcrumb-item.active { color: var(--text-dark); }

    .cover-wrap { background: #f3efe6; border-radius: 20px; padding: 24px; text-align: center; }
    .cover-img { width: 100%; max-width: 320px; aspect-ratio: 2 / 3; object-fit: cover; border-radius: 12px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15); }
    .cover-empty { width: 100%; max-width: 320px; aspect-ratio: 2 / 3; background: #e9e4df; color: #8a7f77; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto; }

    .badge-brand { background-color: var(--brand); color: #fff; font-weight: 500; padding: 6px 14px; border-radius: 999px; font-size: 12px; }
    .meta-text { font-size: 14px; color: var(--text-muted); font-weight: 400; }
    .synopsis { color: #444; font-size: 15px; line-height: 1.8; text-align: justify; }

    .stock-box { background: #f3efe6; border-radius: 12px; padding: 16px 20px; display: inline-flex; align-items: center; gap: 12px; }
    .stock-box .stock-label { font-size: 13px; color: var(--text-muted); margin: 0; }
    .stock-box .stock-value { font-size: 22px; font-weight: 600; color: var(--text-dark); margin: 0; line-height: 1; }
    .stock-box .stock-icon { width: 40px; height: 40px; border-radius: 50%; background: var(--brand); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 16px; }
    .stock-empty .stock-icon { background: #b0a79f; }

    .btn-lg-custom { padding: 14px 32px; font-size: 15px; border-radius: 999px; font-weight: 500; }
    .alert-success { background-color: #e8f0e3; border-color: #c8d9bf; color: #4a6b3a; }
</style>
@endpush

@section('content')
    <div class="page-wrap">
        <!-- Tombol kembali -->
        <div class="pb-4">
            <a href="{{ url('/') }}" class="text-decoration-none fw-medium" style="color: var(--brand);">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $book->category->nama_kategori ?? 'Tanpa Kategori' }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($book->judul, 40) }}</li>
            </ol>
        </nav>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-5 align-items-start mb-5">
            <!-- KIRI: Cover -->
            <div class="col-lg-4">
                <div class="cover-wrap">
                    @if($book->cover)
                        <img src="{{ asset('storage/' . $book->cover) }}" class="cover-img" alt="Cover {{ $book->judul }}">
                    @else
                        <div class="cover-empty"><span>No Cover</span></div>
                    @endif
                </div>
            </div>

            <!-- KANAN: Info & Tombol -->
            <div class="col-lg-8">
                <span class="badge-brand d-inline-block mb-3">
                    {{ $book->category->nama_kategori ?? 'Tanpa Kategori' }}
                </span>

                <h1 class="section-title" style="margin-bottom: 8px;">{{ $book->judul }}</h1>
                <hr class="section-divider" style="margin: 10px 0 24px;">
                
                <p class="meta-text mb-4">
                    <i class="fas fa-pen-nib me-1"></i> {{ $book->penulis }}
                    <span class="mx-2">•</span>
                    <i class="fas fa-calendar-alt me-1"></i> {{ $book->tahun_terbit }}
                </p>

                <div class="stock-box mb-4 {{ $book->stok > 0 ? '' : 'stock-empty' }}">
                    <div class="stock-icon"><i class="fas fa-book"></i></div>
                    <div>
                        <p class="stock-label">Stok Tersedia</p>
                        <p class="stock-value">{{ $book->stok }} <span style="font-size: 13px; font-weight: 400; color: var(--text-muted);">buku</span></p>
                    </div>
                </div>

                <h6 class="fw-semibold mb-2" style="font-size: 15px;">Sinopsis</h6>
                <p class="synopsis mb-4">{{ $book->sinopsis ?? 'Belum ada sinopsis untuk buku ini.' }}</p>

                <!-- Tombol Pinjam -->
                <div class="d-flex flex-wrap align-items-center gap-3 pt-2">
                    @auth
                        @if($isBorrowedByUser)
                            <button type="button" class="btn btn-warning btn-lg-custom text-dark" disabled>
                                <i class="fas fa-clock me-2"></i> Buku Sedang Kamu Pinjam
                            </button>
                            <a href="{{ route('borrow.history') }}" class="btn btn-outline-secondary btn-lg-custom">Cek Riwayat</a>
                        @elseif($book->stok > 0)
                            <button type="button" class="btn btn-custom btn-lg-custom" data-bs-toggle="modal" data-bs-target="#modalPinjam">
                                <i class="fas fa-book-reader me-2"></i> Pinjam Buku Sekarang
                            </button>
                            <span class="text-muted small"><i class="fas fa-info-circle me-1"></i> Durasi: 7 Hari</span>
                        @else
                            <button type="button" class="btn btn-secondary btn-lg-custom" disabled>
                                <i class="fas fa-ban me-2"></i> Stok Habis
                            </button>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-custom btn-lg-custom">
                            <i class="fas fa-sign-in-alt me-2"></i> Login Untuk Meminjam
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL KONFIRMASI PINJAM -->
    @auth
        @if(!$isBorrowedByUser && $book->stok > 0)
            <div class="modal fade" id="modalPinjam" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="border-radius: 16px; border: none;">
                        <div class="modal-body text-center p-4">
                            <div class="mb-3" style="color: var(--brand);"><i class="fas fa-book-reader fa-3x"></i></div>
                            <h4 class="fw-bold mb-2">Konfirmasi Peminjaman</h4>
                            <p class="text-muted mb-4">Apakah kamu yakin ingin meminjam buku <br><strong>"{{ $book->judul }}"</strong>?<br>Durasi peminjaman adalah <strong>7 Hari</strong>.</p>
                            
                            <form action="{{ route('borrow.user', ['id' => $book->id]) }}" method="post" class="d-flex gap-2 justify-content-center">
                                @csrf
                                <button type="button" class="btn btn-light border px-4" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-custom px-4">Ya, Pinjam!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endauth
@endsection