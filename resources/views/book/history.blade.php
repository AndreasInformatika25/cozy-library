@extends('layouts.user')

@section('title', 'Riwayat Peminjaman')

@push('styles')
<style>
    /* CSS Khusus Halaman Riwayat */
    .page-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(26px, 4vw, 36px);
        color: var(--text-dark);
        margin-bottom: 24px;
    }

    .card-custom {
        background: #fff;
        border: 1px solid #eee;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        overflow: hidden;
    }

    /* Tabel */
    .table { margin-bottom: 0; }
    .table thead th {
        background: #f3efe6 !important;
        color: var(--text-dark);
        font-weight: 600; font-size: 13px;
        border-bottom: 1px solid #eee;
        padding: 16px;
    }
    .table tbody td {
        font-size: 14px; vertical-align: middle;
        padding: 16px; border-bottom: 1px solid #eee;
    }
    
    /* Badge Status */
    .badge-dipinjam {
        background-color: #fce4d6; /* Orange soft */
        color: #c05020;
        font-weight: 500;
    }
    .badge-selesai {
        background-color: #d1e7dd; /* Green soft */
        color: #0f5132;
        font-weight: 500;
    }
</style>
@endpush

@section('content')
    <div class="page-wrap">
        <h1 class="page-title mt-4">Riwayat Peminjaman</h1>
        
        <div class="card-custom">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Buku</th>
                            <th>Tgl Pinjam</th>
                            <th>Tenggat Kembali</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayat as $item)
                            <tr>
                                <td>
                                    <strong class="d-block text-dark">{{ $item->book->judul ?? 'Buku Dihapus' }}</strong>
                                    <small class="text-muted">{{ $item->book->penulis ?? '-' }}</small>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y') }}</td>
                                <td>
                                    @if($item->status == 'dipinjam')
                                        <span class="badge badge-dipinjam rounded-pill px-3 py-2">Sedang Dipinjam</span>
                                    @else
                                        <span class="badge badge-selesai rounded-pill px-3 py-2">Dikembalikan</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-5">
                                    <i class="fas fa-book-open fa-3x mb-3 text-black-50"></i><br>
                                    Belum ada riwayat peminjaman.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="mt-4">
            <a href="{{ url('/') }}" class="text-decoration-none fw-medium" style="color: var(--brand);">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
@endsection