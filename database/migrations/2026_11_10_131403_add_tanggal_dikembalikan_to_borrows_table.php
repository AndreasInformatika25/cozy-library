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
        Schema::table('borrows', function (Blueprint $table) {
            // Kolom ini nullable karena saat awal pinjam, buku belum dikembalikan
            $table->date('tanggal_dikembalikan')->nullable()->after('tanggal_kembali');
        });
    }

    public function down(): void
    {
        Schema::table('borrows', function (Blueprint $table) {
            $table->dropColumn('tanggal_dikembalikan');
        });
    }
};
