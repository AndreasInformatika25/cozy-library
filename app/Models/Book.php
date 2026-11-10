<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'judul',
        'penulis',
        'tahun_terbit',
        'sinopsis',
        'stok',
        'cover',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
