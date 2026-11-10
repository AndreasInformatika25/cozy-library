<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Menampilkan daftar kategori di halaman Admin.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories', compact('categories'));
    }

    /**
     * Menyimpan kategori baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|min:3'
        ]);
        
        Category::create($validated);
        
        return redirect()->route('category.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit kategori (berupa modal di halaman index).
     */
    public function edit(string $id)
    {
        // Ambil semua data kategori untuk ditampilkan di tabel
        $categories = Category::latest()->get();
        
        // Ambil data kategori spesifik yang akan diedit
        $detailedCategory = Category::findOrFail($id);
        
        return view('admin.categories', compact('categories', 'detailedCategory'));
    }

    /**
     * Memperbarui data kategori di database.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|min:3'
        ]);
        
        $category = Category::findOrFail($id);
        $category->update($validated);
        
        return redirect()->route('category.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Menghapus data kategori dari database.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        
        return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus!');
    }
}