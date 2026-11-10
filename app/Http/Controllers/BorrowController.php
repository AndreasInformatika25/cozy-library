<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    /**
     * Menampilkan daftar peminjaman di halaman Admin.
     */
    public function index()
    {
        // Ambil data peminjaman beserta relasi user dan bukunya (yang terbaru di atas)
        $borrows = Borrow::with(['user', 'book'])->latest()->get();
        
        // Ambil user dengan role member untuk dropdown form
        $members = User::whereIn('role', ['member', 'pekerja'])->get();
        
        // Ambil semua buku untuk dropdown form
        $books = Book::all();
        
        return view('admin.borrowings', compact('borrows', 'members', 'books'));
    }

    /**
     * Mencatat peminjaman manual oleh Admin/Pekerja.
     */
        public function store(Request $request)
    {
        // 1. Validasi hanya untuk user dan buku
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
        ]);

        // 2. Otomatis set tanggal pinjam (hari ini) dan tenggat (7 hari ke depan)
        $validated['tanggal_pinjam'] = Carbon::now()->format('Y-m-d');
        $validated['tanggal_kembali'] = Carbon::now()->addDays(7)->format('Y-m-d');
        $validated['status'] = 'dipinjam';
        
        // 3. Cek stok buku sebelum dipinjam
        $book = Book::findOrFail($request->book_id);
        if ($book->stok < 1) {
            return back()->withErrors(['Mohon maaf, stok buku ini sedang kosong / habis dipinjam.']);
        }

        // 4. Simpan transaksi
        Borrow::create($validated);
        
        // 5. Kurangi stok buku
        $book->decrement('stok');
        
        return redirect()->route('borrow.index')->with('success', 'Data peminjaman berhasil dicatat! Stok buku telah dikurangi.');
    }

    /**
     * Mengubah status peminjaman menjadi dikembalikan.
     */
    public function returnBook(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        
        $borrow->update([
            'status' => 'dikembalikan',
            'tanggal_dikembalikan' => Carbon::now()->format('Y-m-d')
        ]);
        
        $borrow->book->increment('stok');

        return redirect()->route('borrow.index')->with('success', 'Buku berhasil dikembalikan dan stok telah di-update!');
    }

    /**
     * Proses pinjam buku yang dilakukan oleh User (Member) sendiri.
     */
    public function pinjamUser($book_id)
    {
        $book = Book::findOrFail($book_id);

        // 1. Cek Stok
        if ($book->stok < 1) {
            return back()->withErrors(['Mohon maaf, stok buku ini sedang kosong / habis dipinjam.']);
        }

        // 2. Cek apakah user sudah meminjam buku yang sama dan belum dikembalikan
        $sudahPinjam = Borrow::where('user_id', Auth::id())
                             ->where('book_id', $book->id)
                             ->where('status', 'dipinjam')
                             ->exists();

        if ($sudahPinjam) {
            return back()->withErrors(['Kamu masih meminjam buku ini dan belum mengembalikannya.']);
        }

        // 3. Catat transaksi peminjaman
        $tanggal_sekarang = Carbon::now();
        $tanggal_kembali = Carbon::now()->addDays(7);

        Borrow::create([
            'user_id'         => Auth::id(),
            'book_id'         => $book->id,
            'tanggal_pinjam'  => $tanggal_sekarang->format('Y-m-d'),
            'tanggal_kembali' => $tanggal_kembali->format('Y-m-d'),
            'status'          => 'dipinjam'
        ]);

        // 4. Kurangi stok buku
        $book->decrement('stok');

        return redirect()->route('book.detail', $book->id)->with('success', 'Berhasil meminjam buku! Wajib dikembalikan maksimal 7 hari dari sekarang.');
    }

    /**
     * Menampilkan riwayat peminjaman milik user yang sedang login.
     */
    public function riwayat()
    {
        $riwayat = Borrow::with('book')
                    ->where('user_id', Auth::id())
                    ->orderBy('created_at', 'desc')
                    ->get();
                    
        return view('book.history', compact('riwayat'));
    }
}