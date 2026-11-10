@extends('layouts.user')

@section('title', 'Cara Meminjam Buku')

@push('styles')
<style>
    /* CSS Khusus Halaman Panduan */
    .step-card { background: #fff; border: 1px solid #eee; border-radius: 16px; padding: 24px; height: 100%; box-shadow: 0 4px 15px rgba(0,0,0,0.03); transition: transform 0.2s; }
    .step-card:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,0.08); }
    .step-number { width: 40px; height: 40px; background: #f3efe6; color: var(--brand); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 18px; font-weight: 700; margin-bottom: 16px; }

    .accordion-item { border: 1px solid #eee; border-radius: 12px !important; margin-bottom: 12px; overflow: hidden; }
    .accordion-button { font-weight: 500; color: var(--text-dark); background: #fff; padding: 18px 20px; }
    .accordion-button:not(.collapsed) { color: var(--brand); background: #f3efe6; box-shadow: none; }
    .accordion-button:focus { border-color: var(--brand); box-shadow: 0 0 0 3px rgba(196, 154, 128, 0.2); }
</style>
@endpush

@section('content')
    <div class="page-wrap">
        <div class="pb-3">
            <a href="{{ url('/') }}" class="text-decoration-none fw-medium" style="color: var(--brand);">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>

        <div class="text-center mb-5">
            <h1 class="section-title">Bagaimana Cara Meminjam Buku?</h1>
            <hr class="section-divider">
            <p class="text-muted">Ikuti langkah-langkah mudah di bawah ini untuk mulai meminjam buku favoritmu.</p>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="step-card text-center">
                    <div class="step-number mx-auto">1</div>
                    <h5 class="fw-bold mb-2">Cari Buku</h5>
                    <p class="text-muted small mb-0">Jelajahi koleksi kami dan temukan buku yang ingin kamu baca di halaman Beranda.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="step-card text-center">
                    <div class="step-number mx-auto">2</div>
                    <h5 class="fw-bold mb-2">Klik Pinjam</h5>
                    <p class="text-muted small mb-0">Buka halaman detail buku, lalu klik tombol <strong>Pinjam Buku Sekarang</strong>.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="step-card text-center">
                    <div class="step-number mx-auto">3</div>
                    <h5 class="fw-bold mb-2">Tunggu & Baca</h5>
                    <p class="text-muted small mb-0">Buku berhasil dipinjam! Kamu punya waktu <strong>7 hari</strong> untuk membacanya.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <div class="bg-light rounded-4 p-4 p-md-5" style="background-color: #f3efe6 !important;">
                    <h4 class="fw-bold mb-3 text-center">Syarat & Ketentuan</h4>
                    <ul class="text-muted mb-0" style="line-height: 2;">
                        <li>Kamu harus memiliki akun (Login) untuk meminjam buku.</li>
                        <li>Durasi peminjaman maksimal adalah <strong>7 hari</strong> sejak tanggal pinjam.</li>
                        <li>Buku yang sama tidak dapat dipinjam dua kali oleh user yang sama sebelum dikembalikan.</li>
                        <li>Jika stok buku menunjukkan angka <strong>0</strong>, berarti buku sedang tidak tersedia.</li>
                        <li>Pastikan kamu mengembalikan buku tepat waktu agar tidak terkena sanksi/denda.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <h4 class="fw-bold mb-4 text-center">Pertanyaan Umum (FAQ)</h4>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Apakah saya bisa meminjam lebih dari satu buku?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Bisa, selama stok buku yang ingin kamu pinjam masih tersedia. Namun, pastikan kamu mengembalikannya tepat waktu.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Bagaimana cara mengembalikan buku?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Saat ini pengembalian buku dilakukan secara langsung dengan menyerahkan buku ke pustakawan (Admin/Pekerja) di perpustakaan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center pb-4">
            <a href="{{ url('/') }}" class="btn btn-custom btn-lg px-5 py-3" style="border-radius: 999px;">
                Mulai Cari Buku <i class="fas fa-search ms-2"></i>
            </a>
        </div>
    </div>
@endsection