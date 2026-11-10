<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\HomeController;
use App\Models\Category;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

/*
|--------------------------------------------------------------------------
| RUTE PUBLIK & USER (Bisa diakses tanpa login)
|--------------------------------------------------------------------------
*/

// Halaman Beranda (Home)
Route::get('/', function () {
    $semuaKategori = Category::with(['books' => function($q) {
        $q->latest()->take(7);
    }])->get();

    $semuaBuku = Book::with('category')->latest()->get();

    // Statistik untuk Hero Section
    $totalBuku = Book::count();
    $totalKategori = Category::count();
    $totalUser = User::where('role', 'member')->count();

    return view('home', compact(
        'semuaKategori', 'semuaBuku', 'totalBuku', 'totalKategori', 'totalUser'
    ));
});

// Detail Buku (Bisa dilihat siapa saja)
Route::get('/buku/{id}/detail', [BookController::class, 'show'])->name('book.detail');


/*
|--------------------------------------------------------------------------
| RUTE MEMBER & ADMIN (Wajib Login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // Halaman /home (Bawaan Laravel, diarahkan ke HomeController)
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Pinjam Buku (User)
    Route::post('/buku/{id}/pinjam', [BorrowController::class, 'pinjamUser'])->name('borrow.user');

    // Riwayat Peminjaman (User)
    Route::get('/riwayat-pinjam', [BorrowController::class, 'riwayat'])->name('borrow.history');
});


/*
|--------------------------------------------------------------------------
| RUTE PEKERJA & ADMIN (Wajib Login & Role: pekerja / admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:pekerja,admin'])->group(function () {
    // Dashboard Admin
    Route::get('/admin', function () {
        $totalBooks = Book::count();
        $totalUsers = User::count();
        $totalBorrowings = Borrow::count();
        $borrowThisMonth = Borrow::whereMonth('created_at', now()->month)
                                 ->whereYear('created_at', now()->year)
                                 ->count();

        $recentActivities = Borrow::with(['user', 'book'])
                                  ->latest()
                                  ->take(4)
                                  ->get();

        $latestBooks = Book::latest()->take(3)->get();
        
        // $recentUsers = User::latest()->take(4)->get();

        return view('admin.dashboard', compact(
            'totalBooks', 'totalUsers', 'totalBorrowings', 'borrowThisMonth',
            'recentActivities', 'latestBooks'
        ));
    });

    // Manajemen Buku (Kecuali Delete)
    Route::get('/buku', [BookController::class, 'index'])->name('book.index');
    Route::post('/buku', [BookController::class, 'store'])->name('book.store');
    Route::get('/buku/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/buku/{id}/edit', [BookController::class, 'update'])->name('book.update');
    Route::delete('/buku/{id}/delete', [BookController::class, 'destroy'])->name('book.delete');

    // Manajemen Kategori
    Route::get('/kategori', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/kategori', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/kategori/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/kategori/{id}/edit', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/kategori/{id}/delete', [CategoryController::class, 'destroy'])->name('category.delete');

    // Manajemen Peminjaman
    Route::get('/peminjaman', [BorrowController::class, 'index'])->name('borrow.index');
    Route::post('/peminjaman', [BorrowController::class, 'store'])->name('borrow.store');
    Route::put('/peminjaman/{id}/kembali', [BorrowController::class, 'returnBook'])->name('borrow.return');

    // Manajemen Anggota (Kecuali Delete)
    Route::get('/anggota', [MemberController::class, 'index'])->name('member.index');
    Route::post('/anggota', [MemberController::class, 'store'])->name('member.store');
    Route::put('/anggota/{id}/update', [MemberController::class, 'update'])->name('member.update');
});


/*
|--------------------------------------------------------------------------
| RUTE KHUSUS ADMIN (Wajib Login & Role: admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    // HANYA ADMIN yang bisa menghapus Anggota
    Route::delete('/anggota/{id}/delete', [MemberController::class, 'destroy'])->name('member.delete');
});

Route::get('/cara-pinjam', function () {
    return view('how-to-borrow');
})->name('how.to.borrow');