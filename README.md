# Cozy Library - Sistem Informasi Perpustakaan 📚

**Oleh:** Andreas  
**NIM:** 2411500750

Proyek Aplikasi Web Tingkat Mahir (UTS) menggunakan framework Laravel. Aplikasi ini dirancang untuk mengelola sirkulasi perpustakaan secara digital dengan fitur manajemen buku, kategori, keanggotaan (berbasis _role_), serta sistem peminjaman dan pengembalian yang terintegrasi dengan kalkulasi denda otomatis.

## 🚀 Fitur Utama

- **Multi-Role Access:** Terdiri dari 3 hak akses (Admin, Pekerja, Member) menggunakan perlindungan Middleware.
- **Sirkulasi Stok Otomatis:** Stok buku akan otomatis berkurang saat dipinjam dan bertambah saat dikembalikan.
- **Manajemen Denda Keterlambatan:** Kalkulasi denda secara otomatis jika pengguna terlambat mengembalikan buku melewati batas waktu 7 hari.
- **DataTables Integration:** Pencarian, _sorting_, _filtering_, dan _pagination_ yang cepat dan responsif pada panel admin.
- **Keamanan Terjamin:** _Password hashing_ menggunakan Bcrypt secara _default_.

## 🎥 Video Presentasi

Penjelasan lengkap mengenai alur kerja aplikasi, logika fitur, dan demonstrasi _role_ dapat dilihat pada video presentasi berikut:  
👉 [**Tonton Video Presentasi di YouTube**](https://youtu.be/v3Y6sx5K7JQ)

## 📂 Berkas Penting (Dokumentasi & Database)

Untuk memudahkan proses penilaian dan _deployment_, saya telah melampirkan berkas berikut di dalam _repository_ (pada _root folder_):

- 📄 **Dokumentasi Lengkap (PDF):** [2411500750 Andreas - Dokumentasi Project UTS Pemprograman Web Tingkat Mahir AF.pdf](docs/2411500750 Andreas - Dokumentasi Project UTS Pemprograman Web Tingkat Mahir AF.pdf)
- 💾 **Export Database (SQL):** [db_perpustakaan.sql](docs/db_perpustakaan.sql) (File _raw database_ lengkap dengan data awal).

## 🛠️ Instalasi & Persiapan

Aplikasi ini menggunakan fitur Migration dan Seeder bawaan Laravel untuk mempermudah setup _database_. Ikuti langkah-langkah berikut untuk menjalankan aplikasi di _local environment_ Anda[cite: 5]:

1. **Clone repository ini**[cite: 5]

    ```bash
    git clone [https://github.com/AndreasInformatika25/cozy-library.git](https://github.com/AndreasInformatika25/cozy-library.git)
    cd cozy-library
    ```

2. **Install dependencies**[cite: 5]

    ```bash
    composer install
    npm install && npm run build
    ```

3. **Konfigurasi Environment**[cite: 5]
    - Copy file `.env.example` menjadi `.env`[cite: 5]
    - Buka file `.env` dan sesuaikan koneksi database (buat nama database baru, misalnya `db_perpustakaan`)[cite: 5].
    - Generate _Application Key_[cite: 5]:
        ```bash
        php artisan key:generate
        ```

4. **Konfigurasi Database (Migration & Seeder)**[cite: 5]
    - Buka phpMyAdmin (atau _database client_ lainnya) dan buat database kosong sesuai nama di file `.env` Anda.
    - Jalankan perintah berikut di terminal untuk mengeksekusi struktur tabel sekaligus mengisi data awal aplikasi (seeder):
        ```bash
        php artisan migrate:fresh --seed
        ```
        _(Catatan Opsi Manual: Jika terjadi kendala pada perintah migration di atas, Anda dapat menggunakan cara alternatif dengan mengimpor langsung file `db_perpustakaan.sql` yang berada di dalam repository ini ke dalam database Anda)._

5. **Link Storage** _(Sangat penting untuk menampilkan gambar cover buku)_[cite: 5]

    ```bash
    php artisan storage:link
    ```

6. **Jalankan Aplikasi**[cite: 5]
    ```bash
    php artisan serve
    ```
    Aplikasi dapat diakses melalui `http://127.0.0.1:8000`[cite: 5]

## 👥 Akun Default (Testing)

Setelah berhasil menjalankan _seeder_ (atau mengimpor database `.sql`), Anda dapat login menggunakan akun _testing_ berikut[cite: 5]:

- **Admin:** `admin@admin.com` | Password: `admin123`[cite: 5]
- **Pekerja:** `fiony@gmail.com` | Password: `fiony123`[cite: 5]
- **Member:** `windah@gmail.com` | Password: `123456789`[cite: 5]

---

_Dibuat oleh Andreas (2411500750) untuk memenuhi tugas Ujian Tengah Semester (UTS) - Pemrograman Web Tingkat Mahir._[cite: 5]
