<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel users (siapa yang minjam)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Relasi ke tabel books (buku apa yang dipinjam)
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
            
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali'); // Target tanggal balikin buku
            
            // Status ini yang bakal kita pakai buat fitur "Pengembalian" nanti
            $table->enum('status', ['dipinjam', 'dikembalikan'])->default('dipinjam'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
