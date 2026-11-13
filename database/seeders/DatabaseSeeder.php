<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // 1. SEEDER USERS
        $users = [
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => Hash::make('admin123'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'name' => 'Fiony',
                'email' => 'fiony@gmail.com',
                'role' => 'pekerja',
                'password' => Hash::make('fiony123'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'name' => 'Windah Basudara',
                'email' => 'windah@gmail.com',
                'role' => 'member',
                'password' => Hash::make('123456789'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 11,
                'name' => 'Gracie',
                'email' => 'gracie@gmail.com',
                'role' => 'member',
                'password' => Hash::make('123456789'),
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];
        User::insert($users);

        // 2. SEEDER KATEGORI
        $categories = [
            ['id' => 1, 'nama_kategori' => 'Pengembangan Diri', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 5, 'nama_kategori' => 'Fiksi', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 6, 'nama_kategori' => 'Komputer', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 9, 'nama_kategori' => 'Filsafat', 'created_at' => $now, 'updated_at' => $now],
        ];
        Category::insert($categories);

        // 3. SEEDER BUKU DENGAN MAPPING NAMA FILE COVER
        $books = [
            [
                'id' => 1,
                'category_id' => 1,
                'judul' => 'Atomic Habits: Perubahan Kecil yang Memberikan Hasil Luar Biasa',
                'penulis' => 'James Clear',
                'tahun_terbit' => '2019',
                'stok' => 5,
                'cover' => 'covers/Atomic Habit.jpg',
                'sinopsis' => "Atomic Habits: Perubahan Kecil yang Memberikan Hasil Luar Biasa adalah buku kategori self improvement karya James Clear. Pada umumnya, perubahan-perubahan kecil seringkali terkesan tak bermakna karena tidak langsung membawa perubahan nyata pada hidup suatu manusia.",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'category_id' => 1,
                'judul' => 'Berani Tidak Disukai',
                'penulis' => 'Ichiro Kishimi & Fumitake Koga',
                'tahun_terbit' => '2019',
                'stok' => 2,
                'cover' => 'covers/Berani Tidak Disukai.jpg',
                'sinopsis' => "Berani Tidak Disukai memiliki judul asli 'The Courage to be Disliked: How to Free Yourself, Change Your Life and Achieve Real Happiness'. Buku ini berisikan dialog antara seorang filsuf dengan seorang pemuda tentang cara mendapatkan kebahagiaan.",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'category_id' => 1,
                'judul' => 'Bicara Itu Ada Seninya',
                'penulis' => 'Oh Su Hyang',
                'tahun_terbit' => '2016',
                'stok' => 5,
                'cover' => 'covers/Bicara Itu Ada Seninya.jpg',
                'sinopsis' => "Tahukah Anda bahwa berbicara itu ada seninya? Ketika komunikasi menjadi hal yang penting untuk bersaing, pakar komunikasi Oh Su Hyang mengeluarkan buku yang memuat teknik komunikasi, persuasi, dan negosiasi.",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'category_id' => 1,
                'judul' => 'Filosofi Teras',
                'penulis' => 'Henry Manampiring',
                'tahun_terbit' => '2023',
                'stok' => 3,
                'cover' => 'covers/Filosodi Teras.jpg',
                'sinopsis' => "Lebih dari 2000 tahun lalu, sebuah mazhab filsafat menemukan akar masalah dan juga solusi dari banyak emosi negatif. Stoisisme, atau Filosofi Teras, bisa membantu kita mengatasi emosi negatif dan menghasilkan mental tangguh.",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'category_id' => 1,
                'judul' => 'Goodbye, Things: Hidup Minimalis ala Orang Jepang',
                'penulis' => 'Fumio Sasaki',
                'tahun_terbit' => '2018',
                'stok' => 7,
                'cover' => 'covers/Goodbye Things.jpg',
                'sinopsis' => "Fumio Sasaki bukan ahli dalam hal minimalisme; ia hanya pria biasa yang mudah tertekan, sampai suatu hari ia memutuskan untuk mengubah hidupnya dengan mengurangi barang yang ia miliki.",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 6,
                'category_id' => 1,
                'judul' => 'The Alpha Girl`S Guide',
                'penulis' => 'Henry Manampiring',
                'tahun_terbit' => '2020',
                'stok' => 4,
                'cover' => 'covers/The Alpha Girl`S Guide.jpg',
                'sinopsis' => "Alpha Female adalah para perempuan yang menginspirasi, memimpin, menggerakkan orang sekitarnya, dan membawa perubahan. Mereka cerdas, percaya diri, dan independen.",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 7,
                'category_id' => 1,
                'judul' => 'The 5 AM Club : Bangun Rutinitas Pagi Untuk Level Up Hidupmu!',
                'penulis' => 'Robin Sharma',
                'tahun_terbit' => '2021',
                'stok' => 8,
                'cover' => 'covers/The 5am Club.jpg',
                'sinopsis' => "Buku ini membantu Anda melekat pada kebiasaan bangun pagi hari sebagai praktik seumur hidup juga menerapkan The 20/20/20 Formula sebagai rutinitas pagi sehingga Anda mengalami hasil kelas-dunia.",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'category_id' => 1,
                'judul' => 'The Power Of Habit',
                'penulis' => 'Charles Duhigg',
                'tahun_terbit' => '2019',
                'stok' => 2,
                'cover' => 'covers/The Power Of Habit.jpg',
                'sinopsis' => "Buku ini membawa pembacanya dalam pengendalian diri dan merubah pola pikir ketika disikapi suatu keadaan. Charles menjabarkan sistematis suatu sikap melalui 3 tahapan yaitu tanda, rutinitas, dan ganjaran.",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 18,
                'category_id' => 5,
                'judul' => 'Cantik Itu Luka',
                'penulis' => 'Eka Kurniawan',
                'tahun_terbit' => '2018',
                'stok' => 2,
                'cover' => 'covers/Cantik Itu Luka.jpg',
                'sinopsis' => "Di satu sore, dua puluh satu tahun kemudian, Dewi Ayu bangkit dari kuburannya. Kebangkitannya menguak kutukan dan tragedi keluarga dengan latar era kolonialisme.",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 19,
                'category_id' => 5,
                'judul' => 'Funiculi Funicula',
                'penulis' => 'Toshikazu Kawaguchi',
                'tahun_terbit' => '2021',
                'stok' => 3,
                'cover' => 'covers/Funiculi Funicula.jpg',
                'sinopsis' => "Kafe tua yang berada di gang kecil Tokyo terkenal karena bisa membawa pengunjungnya menjelajahi waktu dengan berbagai peraturannya sendiri.",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 20,
                'category_id' => 5,
                'judul' => 'Laut Bercerita',
                'penulis' => 'Leila S. Chudori',
                'tahun_terbit' => '2017',
                'stok' => 7,
                'cover' => 'covers/Laut Bercerita.jpg',
                'sinopsis' => "Bertutur tentang kisah keluarga yang kehilangan, sekumpulan sahabat, tentang mereka yang mencari kejelasan makam anaknya, dan tentang cinta yang tak akan luntur.",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 21,
                'category_id' => 5,
                'judul' => 'Seporsi Mie Ayam Sebelum Mati',
                'penulis' => 'Brian Khrisna',
                'tahun_terbit' => '2025',
                'stok' => 10,
                'cover' => 'covers/Seporsi Mie Ayam Sebelum Mati.jpg',
                'sinopsis' => "Aku akan bunuh diri 24 jam dari sekarang. Edisi cetakan ke-100 ini hadir sebagai edisi spesial dan terbatas dengan tambahan chapter dan ilustrasi.",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 22,
                'category_id' => 5,
                'judul' => 'Sisi Tergelap Surga',
                'penulis' => 'Brian Khrisna',
                'tahun_terbit' => '2023',
                'stok' => 1,
                'cover' => 'covers/Sisi Tergelap Surga.jpg',
                'sinopsis' => "Sebuah cerita tentang kehidupan orang-orang yang hidup di sisi tergelap surga kota bernama Jakarta, di mana semua dipaksa bergelut demi bisa hidup dari hari ke hari.",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 23,
                'category_id' => 5,
                'judul' => 'Timun Jelita',
                'penulis' => 'Raditya Dika',
                'tahun_terbit' => '2024',
                'stok' => 2,
                'cover' => 'covers/Timun Jelita.jpg',
                'sinopsis' => "Timun Jelita, sebuah cerita panjang dan duo musik. Setelah ayahnya meninggal, seorang akuntan 40 tahun menemukan hasrat untuk kembali bermusik bersama saudaranya.",
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];
        Book::insert($books);
    }
}