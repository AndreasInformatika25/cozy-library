<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Front extends Model
{
    protected $table = 'buku_tabel';
    protected $fillable = [
        'judul',
        'penulis',
        'tahun_terbit',
        'cover',
        'category_id'
    ];
}
