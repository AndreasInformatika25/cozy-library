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
👉 [**Tonton Video Presentasi di YouTube**](https://youtu.be/AASrsIi57HU)

## 📂 Berkas Penting (Dokumentasi & Database)

Untuk memudahkan proses penilaian dan _deployment_, saya telah melampirkan berkas berikut di dalam _repository_ (pada _root folder_):

- 📄 **Dokumentasi Lengkap (PDF):** `docs/Dokumentasi_UTS_Cozy_Library_Final.pdf` (Berisi ERD, penjelasan _role_, dan _screenshot_ antarmuka).
- 💾 **Export Database (SQL):** `db_perpustakaan.sql` (File _raw database_ lengkap dengan data awal).

## 🛠️ Instalasi & Persiapan

Aplikasi ini menggunakan pendekatan ekspor/impor SQL murni untuk _database_-nya. Ikuti langkah-langkah berikut untuk menjalankan aplikasi di _local environment_ Anda:

1. **Clone repository ini**

    ```bash
    git clone https://github.com/AndreasInformatika25/cozy-library.git
    cd cozy-library
    ```

2. **Install dependencies**

    ```bash
    composer install
    npm install && npm run build
    ```

3. **Konfigurasi Environment**
    - Copy file `.env.example` menjadi `.env`
    - Buka file `.env` dan sesuaikan koneksi database (buat nama database baru, misalnya `db_perpustakaan`).
    - Generate _Application Key_:
        ```bash
        php artisan key:generate
        ```

4. **Konfigurasi Database (Import SQL)**
   Karena proyek ini mengandalkan _raw SQL_, Anda **tidak perlu** menjalankan perintah `migrate`.
    - Buka phpMyAdmin (atau _database client_ lainnya).
    - Buat database baru sesuai dengan nama di file `.env` Anda.
    - **Import** file `db_perpustakaan.sql` yang ada di _repository_ (berada di folder docs) ini ke dalam database tersebut.

5. **Link Storage** _(Sangat penting untuk menampilkan gambar cover buku)_

    ```bash
    php artisan storage:link
    ```

6. **Jalankan Aplikasi**
    ```bash
    php artisan serve
    ```
    Aplikasi dapat diakses melalui `http://127.0.0.1:8000`

## 👥 Akun Default (Testing)

Setelah mengimpor database `.sql`, Anda dapat login menggunakan akun _testing_ berikut:

- **Admin:** `admin@admin.com` | Password: `admin123`
- **Pekerja:** `fiony@gmail.com` | Password: `fiony123`
- **Member:** `windah@gmail.com` | Password: `123456789`

---

_Dibuat oleh Andreas (2411500750) untuk memenuhi tugas Ujian Tengah Semester (UTS) - Pemrograman Web Tingkat Mahir._
