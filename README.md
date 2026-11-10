# 📚 Cozy Library - Projek UTS Pemrograman Web Tingkat Mahir

Aplikasi manajemen perpustakaan digital "Cozy Library" yang dibangun untuk memenuhi Projek Ujian Tengah Semester (UTS) mata kuliah Pemrograman Web Tingkat Mahir.

Aplikasi ini tidak hanya mengelola buku, tetapi juga memfasilitasi manajemen anggota, kategori, dan transaksi peminjaman lengkap dengan kalkulasi denda dan pemotongan stok otomatis.

---

## 👥 Tim Pengembang (Kelompok AF)

- **[Andreas]** - 2411500750

---

## 🛠️ Teknologi yang Digunakan

- **Framework:** Laravel 13
- **Database:** MariaDB
- **Frontend:** HTML, CSS, Bootstrap 5, Blade Templating
- **Library Tambahan:** DataTables (untuk _Search, Sort, Pagination_)

---

## ✅ Kesesuaian dengan Spesifikasi Tugas UTS

Aplikasi ini telah memenuhi dan melampaui seluruh kriteria yang disyaratkan pada dokumen spesifikasi tugas:

1.  **Arsitektur MVC & Routing:** Dibangun dengan pemisahan _Model_, _View_, dan _Controller_ yang bersih.
2.  **Blade Template & Component:** Antarmuka responsif dan konsisten menggunakan komponen Blade dan Bootstrap 5.
3.  **Database & Relasi (Eloquent ORM):** Memiliki 4 tabel utama (`users`, `categories`, `books`, `borrows`) dengan menerapkan relasi _One-to-Many_ melalui _migration_ dan _seeder_.
4.  **4 Modul CRUD & Validasi:** Meliputi manajemen Buku, Kategori, User (Anggota/Pekerja), dan Transaksi Peminjaman. Dilengkapi dengan _Form Request Validation_ yang ketat.
5.  **Search, Filter, Sorting, Pagination:** Diimplementasikan secara penuh pada dashboard admin menggunakan DataTables.
6.  **Authentication & Authorization:** Sistem _Login/Register_ yang terenkripsi (Hash). Memiliki 3 _Role_ pengguna (Admin, Pekerja, Member) dengan hak akses yang berbeda (melampaui syarat minimal 2 _role_).
7.  **Protected Routes:** Menggunakan _Role Middleware_ untuk melindungi akses rute halaman admin agar tidak dapat diterobos oleh member biasa atau publik.

---

## 🔐 Akun Default (Testing)

Gunakan kredensial berikut untuk masuk sebagai Super Admin (berdasarkan seeder):

- **Email:** `admin@gmail.com`
- **Password:** `password`

---

## 📎 Tautan Penting

- **Video Presentasi (YouTube):** [Link Video YouTube Kamu]
- **Dokumentasi Proyek (PDF):** Terdapat pada file `Projek_UTS_[NamaKelompok].pdf` di dalam repository ini.

_Dibuat untuk memenuhi tugas UTS Pemrograman Web Tingkat Mahir._
