@extends('layouts.admin')

@section('title', 'Manajemen Kategori')

@push('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    
    <style>
        /* CSS Khusus Halaman Kategori */
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
        
        .btn-action {
            width: 32px; height: 32px; padding: 0;
            display: inline-flex; align-items: center; justify-content: center;
            border-radius: 8px; border: 1px solid var(--border); background: #fff;
            transition: all .2s;
        }
        .btn-action.edit { color: #0d6efd; }
        .btn-action.edit:hover { background: #0d6efd; color: #fff; border-color: #0d6efd; }
        .btn-action.delete { color: #dc3545; }
        .btn-action.delete:hover { background: #dc3545; color: #fff; border-color: #dc3545; }
    </style>
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Manajemen Kategori</h2>
            <p class="text-muted small mb-0">Kelola daftar kategori untuk buku-buku kamu.</p>
        </div>
    </div>

    <!-- Alert Notifikasi -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0" role="alert" style="border-radius: 10px;">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show border-0" role="alert" style="border-radius: 10px;">
            <ul class="mb-0">
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <!-- Form Tambah/Edit Kategori -->
        <div class="col-lg-4 mb-4">
            <div class="card-custom h-100">
                <h4 class="fw-bold mb-4">{{ isset($detailedCategory) ? 'Edit Kategori' : 'Tambah Kategori' }}</h4>
                <form action="{{ isset($detailedCategory) ? route('category.update', ['id' => $detailedCategory->id]) : route('category.store') }}" method="post">
                    @csrf
                    @if (isset($detailedCategory))
                        @method('put')
                    @endif
                    <div class="mb-4">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', $detailedCategory->nama_kategori ?? '') }}" required placeholder="Misal: Fiksi, Teknologi...">
                    </div>
                    
                    <div class="d-flex flex-column gap-2">
                        <button type="submit" class="btn-brand w-100 py-2">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                        @if(isset($detailedCategory))
                            <a href="{{ route('category.index') }}" class="btn btn-light border w-100 py-2">Batal Edit</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel Data Kategori -->
        <div class="col-lg-8">
            <div class="card-custom">
                <table id="tabelKategori" class="table table-hover w-100">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Kategori</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-medium text-dark">{{ $item->nama_kategori }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('category.edit', ['id'=>$item->id]) }}" class="btn-action edit" title="Edit">
                                            <i class="fas fa-edit" style="font-size: 12px;"></i>
                                        </a>
                                        <form action="{{ route('category.delete',['id'=>$item->id]) }}" method="post" class="m-0" onsubmit="return confirm('Yakin mau hapus kategori ini?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn-action delete" title="Hapus">
                                                <i class="fas fa-trash-alt" style="font-size: 12px;"></i>
                                            </button>
                                        </form>
                                    </div>
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
            $('#tabelKategori').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
                },
                columnDefs: [
                    { orderable: false, targets: [2] } // Kolom Aksi gak bisa disortir
                ]
            });
        });
    </script>
@endpush