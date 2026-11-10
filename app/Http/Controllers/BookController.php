<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Menampilkan semua data buku di halaman Admin.
     */
    public function index()
    {
        // Tarik semua data buku beserta relasi kategorinya
        $book = Book::with('category')->latest()->get();
        $categories = Category::all();
        
        return view('admin.books', compact('book', 'categories'));
    }

    /**
     * Menyimpan data buku baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'        => 'required|min:3|unique:books,judul',
            'penulis'      => 'required|min:3',
            'tahun_terbit' => 'required|numeric',
            'sinopsis'     => 'required|min:10|max:2400',
            'category_id'  => 'required|exists:categories,id',
            'stok'         => 'required|integer|min:0',
            'cover'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Upload file cover jika ada
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
            $validated['cover'] = $coverPath;
        }

        Book::create($validated);
        
        return redirect()->route('book.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Menampilkan halaman detail buku (Halaman User).
     */
    public function show(string $id)
    {
        $book = Book::with('category')->findOrFail($id);
        
        // Cek apakah user yang sedang login punya pinjaman aktif untuk buku ini
        $isBorrowedByUser = false;
        if (auth()->check()) {
            $isBorrowedByUser = Borrow::where('user_id', auth()->id())
                                    ->where('book_id', $id)
                                    ->where('status', 'dipinjam')
                                    ->exists();
        }

        return view('book.detail', compact('book', 'isBorrowedByUser'));
    }

    /**
     * Menampilkan form edit data buku.
     */
    public function edit(string $id)
    {
        // 1. Ambil semua data buku untuk menampilkan ulang tabel di halaman admin
        $book = Book::with('category')->latest()->get();
        
        // 2. Ambil data buku spesifik yang akan diedit
        $detailedBook = Book::findOrFail($id);
        
        // 3. Ambil data kategori untuk mengisi dropdown di form
        $categories = Category::all(); 
        
        return view('admin.books', compact('book', 'detailedBook', 'categories'));
    }

    /**
     * Memperbarui data buku di database.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'judul'        => 'required|min:3:books,judul,' . $id,
            'penulis'      => 'required|min:3',
            'tahun_terbit' => 'required|numeric',
            'sinopsis'     => 'required|min:10|max:2400',
            'category_id'  => 'required|exists:categories,id',
            'stok'         => 'required|integer|min:0',
            'cover'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $book = Book::findOrFail($id);

        // Jika admin mengupload cover baru
        if ($request->hasFile('cover')) {
            // Hapus cover lama dari storage jika ada
            if ($book->cover) {
                Storage::disk('public')->delete($book->cover);
            }
            
            // Simpan cover baru
            $coverPath = $request->file('cover')->store('covers', 'public');
            $validated['cover'] = $coverPath;
        }

        $book->update($validated);
        
        return redirect()->route('book.index')->with('success', 'Buku berhasil diperbarui!');
    }

    /**
     * Menghapus data buku dari database beserta gambar covernya.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

        // Hapus file gambar cover dari folder storage
        if ($book->cover) {
            Storage::disk('public')->delete($book->cover);
        }

        $book->delete();
        
        return redirect()->route('book.indexs')->with('success', 'Buku berhasil dihapus!');
    }
}