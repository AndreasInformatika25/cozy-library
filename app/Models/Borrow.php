<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'tanggal_dikembalikan',
        'status',
    ];

    // Artinya: 1 Data Peminjaman ini milik 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Artinya: 1 Data Peminjaman ini meminjam 1 Buku
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}