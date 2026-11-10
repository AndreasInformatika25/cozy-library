@extends('layouts.admin')

@section('title', 'Manajemen Anggota')

@push('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    
    <style>
        /* CSS Khusus Halaman Anggota */
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

        /* --- TOMBOL AKSI --- */
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

                /* --- CUSTOM PAGINATION DATATABLES (BOOTSTRAP 5) --- */
        .dataTables_wrapper .dataTables_paginate {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
        }

        .dataTables_wrapper .dataTables_paginate .pagination {
            margin-bottom: 0;
            gap: 4px; /* Jarak antar tombol */
        }

        /* Semua tombol pagination */
        .dataTables_wrapper .dataTables_paginate .page-link {
            border-radius: 8px !important;
            border: 1px solid var(--border) !important;
            color: var(--text-dark) !important;
            background-color: #fff !important;
            font-size: 14px;
            padding: 8px 14px;
            transition: all 0.2s ease;
            box-shadow: none !important; /* Hilangkan bayangan biru bawaan Bootstrap */
        }

        /* Tombol saat di-hover */
        .dataTables_wrapper .dataTables_paginate .page-link:hover {
            background-color: var(--brand-soft-2) !important;
            color: var(--brand) !important;
            border-color: var(--brand) !important;
            z-index: 1;
        }

        /* Tombol yang sedang aktif (Current Page) */
        .dataTables_wrapper .dataTables_paginate .page-item.active .page-link {
            background-color: var(--brand) !important;
            border-color: var(--brand) !important;
            color: #fff !important;
            font-weight: 600;
            z-index: 2;
        }

        /* Tombol Previous & Next saat disabled (tidak bisa diklik) */
        .dataTables_wrapper .dataTables_paginate .page-item.disabled .page-link {
            background-color: #f9f9f9 !important;
            color: #bbb !important;
            border-color: var(--border) !important;
            cursor: not-allowed;
        }

        /* --- CUSTOM TOMBOL SIMPAN --- */
        .btn-brand {
            padding:12px 0 !important;
            font-size: 16px !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            gap: 8px;
            transition: none !important;
        }
        .btn-brand:hover {
            transform: none !important;
            background-color: var(--brand-hover) !important;
        }
    </style>
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Manajemen Anggota</h2>
            <p class="text-muted small mb-0">Kelola akun member dan pekerja perpustakaan.</p>
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

    <!-- Form Tambah Anggota -->
    <div class="card-custom mb-4">
        <h4 class="fw-bold mb-4">Tambah Akun Baru</h4>
        <form action="{{ route('member.store') }}" method="post">
            @csrf
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="member">Member</option>
                        {{-- HANYA TAMPILKAN OPSI INI JIKA YANG LOGIN ADALAH ADMIN --}}
                        @if(Auth::user()->role === 'admin')
                            <option value="pekerja">Pekerja</option>
                        @endif
                    </select>
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="submit" class="btn-brand w-100" title="Tambah" style="height: 42px; padding: 0;">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Tabel Anggota -->
    <div class="card-custom">
        <table id="tabelAnggota" class="table table-hover w-100">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Anggota</th>
                    <th>Email</th>
                    <th>Tgl Bergabung</th>
                    <th width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <strong class="d-block text-dark">{{ $member->name }}</strong>
                            <span class="badge {{ $member->role == 'pekerja' ? 'bg-primary' : ($member->role == 'admin' ? 'bg-danger' : 'bg-secondary') }} rounded-pill mt-1" style="font-size: 10px;">
                                {{ strtoupper($member->role) }}
                            </span>
                        </td>
                        <td>{{ $member->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($member->created_at)->format('d M Y') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <!-- Tombol Edit -->
                                <button type="button" class="btn-action edit" data-bs-toggle="modal" data-bs-target="#editModal{{ $member->id }}" title="Edit">
                                    <i class="fas fa-edit" style="font-size: 12px;"></i>
                                </button>

                                <!-- Tombol Hapus (Pemicu Modal) -->
                                <button type="button" class="btn-action delete" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $member->id }}" title="Hapus">
                                    <i class="fas fa-trash-alt" style="font-size: 12px;"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ============================================== -->
    <!-- MODALS EDIT & HAPUS ANGGOTA -->
    <!-- ============================================== -->
    @foreach ($members as $member)
        <!-- Modal Edit -->
        <div class="modal fade" id="editModal{{ $member->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $member->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 16px; border: none;">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold" id="editModalLabel{{ $member->id }}">Edit Data Anggota</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('member.update', ['id' => $member->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" value="{{ $member->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $member->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password Baru</label>
                                <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password">
                                <small class="text-muted" style="font-size: 11px;">Isi minimal 8 karakter jika ingin mereset password.</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select name="role" class="form-select" required>
                                    <option value="member" {{ $member->role == 'member' ? 'selected' : '' }}>Member</option>
                                    
                                    {{-- HANYA ADMIN YANG BISA MELIHAT & MEMILIH PEKERJA --}}
                                    @if(Auth::user()->role === 'admin')
                                        <option value="pekerja" {{ $member->role == 'pekerja' ? 'selected' : '' }}>Pekerja</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer border-0 pt-0">
                            <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn-brand">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Hapus -->
        <div class="modal fade" id="hapusModal{{ $member->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content" style="border-radius: 16px; border: none;">
                    <div class="modal-body text-center p-4">
                        <div class="mb-3 text-danger">
                            <i class="fas fa-exclamation-circle fa-3x"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Hapus Anggota?</h5>
                        <p class="text-muted small mb-4">Apakah kamu yakin ingin menghapus akun <strong>"{{ $member->name }}"</strong>? Data yang dihapus tidak bisa dikembalikan.</p>
                        
                        <form action="{{ route('member.delete', ['id' => $member->id]) }}" method="post" class="d-flex gap-2 justify-content-center">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-light border px-4" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger px-4">Ya, Hapus!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
    <!-- jQuery & DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabelAnggota').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
                },
                columnDefs: [
                    { orderable: false, targets: [4] } // Kolom Aksi gak bisa disortir
                ]
            });
        });
    </script>
@endpush