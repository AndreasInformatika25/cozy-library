<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category; // Pastiin model Category di-import
use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // ==========================================
        // URUTAN 1: SEEDER USERS
        // ==========================================
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        // ... (biarin aja sisa akun user lu yang lain di sini)

        // ==========================================
        // URUTAN 2: SEEDER KATEGORI (INI WAJIB SEBELUM BUKU!)
        // ==========================================
        $kategori = ['Fiksi & Novel', 'Sains & Teknologi', 'Sejarah', 'Pengembangan Diri', 'Biografi', 'Komik & Manga'];
        foreach ($kategori as $kat) {
            Category::create(['nama_kategori' => $kat]);
        }

        // ==========================================
        // URUTAN 3: SEEDER BUKU
        // (Sekarang aman, karena kategori dengan ID 1-6 udah dibikin di atas)
        // ==========================================
        for($i = 1; $i <= 25; $i++){
            Book::create([
                'judul' => rtrim($faker->sentence(mt_rand(3, 5)), '.'),
                'penulis' => $faker->name,
                'tahun_terbit' => $faker->numberBetween(2018, 2024),
                'stok' => $faker->numberBetween(2, 20),
                'cover' => 'covers/atomic-habits.jpg', // Contoh hardcode dari screenshot lu
                'category_id' => $faker->numberBetween(1, 6), // Nge-random kategori 1 sampai 6
                'sinopsis' => $faker->paragraph(4),
            ]);
        }
    }
}