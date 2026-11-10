<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Membatasi akses hanya untuk user yang sudah login.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan halaman beranda (Home) untuk user.
     */
    public function index()
    {
        // 1. Ambil kategori beserta 7 buku terbaru di masing-masing kategori (untuk slider)
        $semuaKategori = Category::with(['books' => function($q) {
            $q->latest()->take(7);
        }])->get();

        // 2. Ambil semua buku untuk section "Semua Buku"
        $semuaBuku = Book::with('category')->latest()->get();

        // 3. Ambil data statistik untuk Hero Section
        $totalBuku = Book::count();
        $totalKategori = Category::count();
        $totalUser = User::where('role', 'member')->count(); // Hitung khusus role member

        // 4. Kirim semua data ke view
        return view('home', compact(
            'semuaKategori', 
            'semuaBuku', 
            'totalBuku', 
            'totalKategori', 
            'totalUser'
        ));
    }
}