@extends('layouts.admin')

@section('title', 'Transaksi Peminjaman')

@push('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    
    <style>
        /* CSS Khusus Halaman Peminjaman */
        .card-custom {
            background: #fff; border: 1px solid var(--border);
            border-radius: 16px; padding: 24px; margin-bottom: 24px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        }
        
        /* --- TRIK MEMBUAT DATATABLES FULL WIDTH --- */
        .dataTables_wrapper {
            width: 100%;
        }
        .dataTables_wrapper .row {
            margin: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .dataTables_wrapper .col-sm-12,
        .dataTables_wrapper .col-md-6 {
            padding: 0;
            width: 100%;
            overflow-x: auto;
        }
        .dataTables_filter { margin-bottom: 16px; text-align: right; }
        .dataTables_filter input {
            border-radius: 10px; padding: 8px 16px; border: 1px solid #ddd;
        }
        .dataTables_length { margin-bottom: 16px; }
        .dataTables_length select {
            border-radius: 10px; padding: 6px 30px 6px 12px; border: 1px solid #ddd;
        }

        /* --- TABEL --- */
        .table { 
            margin-bottom: 0; 
            width: 100% !important;
        }
        .table thead th {
            background: var(--brand-soft-2) !important;
            color: var(--text-dark);
            font-weight: 600; font-size: 13px;
            border-bottom: 2px solid var(--border);
            padding: 14px 12px;
        }
        .table tbody td {
            font-size: 14px; vertical-align: middle;
            padding: 12px; border-bottom: 1px solid var(--border);
        }
        .table-hover tbody tr:hover { background-color: var(--brand-soft-2); }

        /* --- TOAST NOTIFIKASI --- */
        .toast-container {
            position: fixed;
            top: 20px; right: 20px;
            z-index: 9999;
        }
        .toast-custom {
            background: #fff;
            border-left: 5px solid var(--brand);
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
    </style>
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Transaksi Peminjaman</h2>
            <p class="text-muted small mb-0">Kelola data peminjaman dan pengembalian buku.</p>
        </div>
    </div>

    <!-- Toast Notifikasi -->
    @if(session('success'))
        <div class="toast-container">
            <div class="toast toast-custom show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                <div class="toast-header border-0 bg-transparent">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    <strong class="me-auto">Berhasil</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body" style="color: var(--text-dark);">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <!-- Form Catat Peminjaman -->
        <div class="col-lg-3 mb-4">
            <div class="card-custom h-100">
                <h4 class="fw-bold mb-4">Catat Pinjaman</h4>
                <form action="{{ route('borrow.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Member</label>
                        <select class="form-select" name="user_id" required>
                            <option value="" disabled selected>-- Pilih --</option>
                            @foreach($members as $member)
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Buku</label>
                        <select class="form-select" name="book_id" required>
                            <option value="" disabled selected>-- Pilih --</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}">{{ $book->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tgl Pinjam</label>
                        <input type="date" class="form-control" name="tanggal_pinjam" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Tenggat Kembali</label>
                        <input type="date" class="form-control" name="tanggal_kembali" required>
                    </div>
                    <button type="submit" class="btn-brand w-100 py-2">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                </form>
            </div>
        </div>

        <!-- Tabel Data Peminjaman -->
        <div class="col-lg-9">
            <div class="card-custom">
                <table id="tabelPeminjaman" class="table table-hover w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Peminjam</th>
                            <th>Buku</th>
                            <th>Tgl Pinjam</th>
                            <th>Tenggat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($borrows as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong class="d-block text-dark">{{ $item->user->name ?? 'User Dihapus' }}</strong>
                                </td>
                                <td>{{ $item->book->judul ?? 'Buku Dihapus' }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y') }}</td>
                                <td>
                                    @if($item->status == 'dipinjam')
                                        <span class="badge rounded-pill bg-warning text-dark px-3 py-2">Dipinjam</span>
                                    @else
                                        <span class="badge rounded-pill bg-success px-3 py-2">Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->status == 'dipinjam')
                                        <!-- Tombol yang memicu Modal Konfirmasi -->
                                        <button type="button" class="btn btn-sm btn-outline-success fw-medium px-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#modalKembali{{ $item->id }}">
                                            Kembalikan
                                        </button>

                                        <!-- Modal Konfirmasi Kembalikan -->
                                        <div class="modal fade" id="modalKembali{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                                <div class="modal-content" style="border-radius: 16px; border: none;">
                                                    <div class="modal-body text-center p-4">
                                                        <div class="mb-3 text-warning">
                                                            <i class="fas fa-exclamation-triangle fa-3x"></i>
                                                        </div>
                                                        <h5 class="fw-bold mb-2">Konfirmasi</h5>
                                                        <p class="text-muted small mb-4">Apakah kamu yakin buku <strong>{{ $item->book->judul ?? 'ini' }}</strong> sudah dikembalikan?</p>
                                                        
                                                        <form action="{{ route('borrow.return', ['id' => $item->id]) }}" method="post" class="d-flex gap-2 justify-content-center">
                                                            @csrf
                                                            @method('put')
                                                            <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn-brand">Ya, Kembalikan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-muted small"><i class="fas fa-check-circle text-success me-1"></i> Tuntas</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- jQuery & DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabelPeminjaman').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
                },
                columnDefs: [
                    { orderable: false, targets: [6] } // Kolom Aksi tidak bisa disortir
                ]
            });
        });
    </script>
@endpush