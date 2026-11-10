@extends('layouts.user')

@section('title', 'Riwayat Peminjaman')

@push('styles')
<style>
    /* CSS Khusus Halaman Riwayat */
    .page-title {
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
        <div class="mt-4">
            <a href="{{ url('/') }}" class="text-decoration-none fw-medium" style="color: var(--brand);">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>
        <h1 class="page-title mt-4">Riwayat Peminjaman</h1>
        <div class="card-custom">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Buku</th>
                            <th>Tgl Pinjam</th>
                            <th>Tenggat Kembali</th>
                            <th>Tgl Dikembalikan</th>
                            <th>Status & Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayat as $item)
                            @php
                                // Logika Hitung Denda untuk User
                                $denda = 0;
                                $telat = 0;
                                if ($item->status == 'dikembalikan' && $item->tanggal_dikembalikan) {
                                    $tenggat = \Carbon\Carbon::parse($item->tanggal_kembali);
                                    $aktual = \Carbon\Carbon::parse($item->tanggal_dikembalikan);
                                    if ($aktual->greaterThan($tenggat)) {
                                        $telat = $aktual->diffInDays($tenggat);
                                        $denda = $telat * 1000; 
                                    }
                                }
                            @endphp
                            <tr>
                                <td>
                                    <strong class="d-block text-dark">{{ $item->book->judul ?? 'Buku Dihapus' }}</strong>
                                    <small class="text-muted">{{ $item->book->penulis ?? '-' }}</small>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y') }}</td>
                                <td>
                                    @if($item->tanggal_dikembalikan)
                                        <span class="text-success fw-medium">{{ \Carbon\Carbon::parse($item->tanggal_dikembalikan)->format('d M Y') }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->status == 'dipinjam')
                                        <span class="badge badge-dipinjam rounded-pill px-3 py-2">Sedang Dipinjam</span>
                                    @else
                                        <span class="badge badge-selesai rounded-pill px-3 py-2">Dikembalikan</span>
                                        @if($telat > 0)
                                            <div class="small text-danger fw-bold mt-1">Telat {{ $telat }} hari<br>Denda: Rp {{ number_format($denda, 0, ',', '.') }}</div>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <!-- Kosongkan -->
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection