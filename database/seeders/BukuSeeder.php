<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buku = [
            [
                'judul'=>'Pengenalan Machine Learning dengan Python',
                'penulis'=>'Dios Kurniawan, M.Sc.',
                'tahun_terbit'=>'2020',
                'created_at'=>now(),
                'updated_at'=>now(),

            ],
            [
                'judul'=>'Atomic Habits: Perubahan Kecil yang memberikan hasil luar biasa',
                'penulis'=>'James Clear',
                'tahun_terbit'=>'2018',
                'created_at'=>now(),
                'updated_at'=>now(),

            ],
        ];
        DB::table('buku_tabel')->insert($buku);
    }
}
