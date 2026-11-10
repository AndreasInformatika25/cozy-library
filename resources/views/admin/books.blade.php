@extends('layouts.admin')

@section('title', 'Daftar Buku')

@push('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    
    <style>
        /* 1. Pastikan Card memenuhi layar */
        .card-custom {
            background: #fff; 
            border: 1px solid var(--border);
            border-radius: 16px; 
            padding: 24px; 
            margin-bottom: 24px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
            width: 100%;
        }

        /* 2. Hancurkan batasan lebar bawaan DataTables */
        .dataTables_wrapper {
            width: 100%;
            margin: 0;
            padding: 0;
        }
        .dataTables_wrapper .row {
            margin: 0 !important;
            width: 100% !important;
            display: flex;
            justify-content: space-between;
        }
        .dataTables_wrapper .col-sm-12, 
        .dataTables_wrapper .col-md-6 {
            padding: 0 !important;
            width: 100% !important;
        }

        /* 3. Tabel memenuhi 100% lebar */
        .table { 
            margin-bottom: 0 !important; 
            width: 100% !important; 
        }
        
        /* Styling Tabel */
        .table thead th {
            background: var(--brand-soft-2) !important;
            color: var(--text-dark);
            font-weight: 600; 
            font-size: 13px;
            border-bottom: 2px solid var(--border) !important;
            border-top: none !important;
            padding: 14px 12px;
        }
        .table tbody td {
            font-size: 14px; 
            vertical-align: middle;
            padding: 12px; 
            border-bottom: 1px solid var(--border);
        }
        .table-hover tbody tr:hover { 
            background-color: var(--brand-soft-2); 
        }
        
        /* Styling Pencarian & Dropdown Entri */
        .dataTables_filter {
            margin-bottom: 16px;
            text-align: right;
        }
        .dataTables_filter input {
            border-radius: 10px; 
            padding: 8px 16px; 
            border: 1px solid #ddd;
            margin-left: 8px;
        }
        .dataTables_length {
            margin-bottom: 16px;
        }
        .dataTables_length select {
            border-radius: 10px; 
            padding: 6px 30px 6px 12px; 
            border: 1px solid #ddd;
        }

        /* Tombol Aksi */
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
            <h2 class="fw-bold mb-0">Daftar Buku</h2>
            <p class="text-muted small mb-0">Kelola semua koleksi buku di sini.</p>
        </div>
        <button class="btn-brand" onclick="document.getElementById('formTambah').scrollIntoView({behavior: 'smooth'})">
            <i class="fas fa-plus me-1"></i> Tambah Buku
        </button>
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

    <!-- Tabel Data Buku -->
    <div class="card-custom">
        <table id="tabelBuku" class="table table-hover w-100">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul / Penulis</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Cover</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($book as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <strong class="d-block text-dark">{{ $item->judul }}</strong>
                            <small class="text-muted">{{ $item->penulis }}</small>
                        </td>
                        <td>{{ $item->tahun_terbit }}</td>
                        <td><span class="badge rounded-pill bg-light text-dark border">{{ $item->category->nama_kategori ?? 'Tanpa Kategori' }}</span></td>
                        <td>
                            <span class="badge {{ $item->stok > 0 ? 'bg-success' : 'bg-danger' }}">
                                {{ $item->stok }}
                            </span>
                        </td>
                        <td>
                            @if($item->cover)
                                <img src="{{ asset('storage/' . $item->cover) }}" alt="Cover" width="45" class="rounded shadow-sm">
                            @else
                                <span class="badge bg-secondary">No Cover</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('book.edit', ['id'=>$item->id]) }}" class="btn-action edit" title="Edit">
                                    <i class="fas fa-edit" style="font-size: 12px;"></i>
                                </a>
                                <form action="{{ route('book.delete',['id'=>$item->id]) }}" method="post" class="m-0" onsubmit="return confirm('Yakin mau hapus buku ini?')">
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

    <!-- Form Tambah/Edit Data -->
    <div class="card-custom" id="formTambah">
        <h4 class="fw-bold mb-4">{{ isset($detailedBook)?'Edit Data Buku':'Tambah Buku Baru' }}</h4>
        <form action="{{ isset($detailedBook)?route('book.update',['id'=>$detailedBook->id]):route('book.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($detailedBook))
                @method('put')
            @endif
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul',$detailedBook->judul ?? '') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis',$detailedBook->penulis ?? '') }}" required>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                    <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" min="1900" max="2099" value="{{ old('tahun_terbit',$detailedBook->tahun_terbit ?? '') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="" disabled selected>-- Pilih --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ (old('category_id', $detailedBook->category_id ?? '') == $cat->id) ? 'selected' : '' }}>
                                {{ $cat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="stok" class="form-label">Stok Buku</label>
                    <input type="number" class="form-control" name="stok" value="{{ old('stok', $detailedBook->stok ?? '') }}" required min="0">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="cover" class="form-label">Cover Buku (Gambar)</label>
                    <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
                </div>

                <div class="col-12 mb-3">
                    <label for="sinopsis" class="form-label">Sinopsis Buku</label>
                    <textarea class="form-control" id="sinopsis" name="sinopsis" rows="3" required>{{ old('sinopsis', $detailedBook->sinopsis ?? '') }}</textarea>
                </div>
            </div>

            <div class="mt-2">
                <button type="submit" class="btn-brand px-4 py-2">
                    <i class="fas fa-save me-1"></i> Simpan Data
                </button>
                @if(isset($detailedBook))
                    <a href="{{ route('book.index') }}" class="btn btn-light border ms-2">Batal Edit</a>
                @endif
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <!-- jQuery & DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabelBuku').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
                },
                columnDefs: [
                    { orderable: false, targets: [4, 6] } // Kolom Cover dan Aksi gak bisa disortir
                ]
            });
        });
    </script>
@endpush