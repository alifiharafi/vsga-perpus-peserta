# Proyek Akhir VSGA JWD 2022
**Proyek Sistem Informasi Perpustakaan** merupakan proyek akhir yang dikerjakan oleh peserta VSGA JWD 2022. Proyek yang disediakan pada repositori ini, 50% sumber kode telah disediakan oleh instruktur, sehingga peserta pelatihan dapat melengkapi sumber kode sampai dengan 100% dengan melihat sebagian contoh sumber kode yang telah disediakan tersebut.

Proses pengerjaan proyek ini dibagi menjadi [Proyek 4](#proyek-4), [Proyek 5](#proyek-5) dan [Proyek 6](#proyek-6), yang akan dijelaskan lebih detil di bawah. Setiap proyek terdiri dari beberapa task.

## Prasyarat
- PHP minimal versi 7.2.x
- Web Server: Apache/NginX
- DBMS: MySQL/MariaDB 

## Akun
- Username:
`admin`
- Password: 
`vsga`

# Proyek 4

## Task #1
- Menggunakan session login
- Tampilkan nama yang disimpan pada session

## Task #2
- Menggunakan `password_hash()` dan `password_verify()` pada proses login
- Menyesuaikan struktur field password pada table admin (length: 60 digit)

## Task #3
- Memindahkan source code bagian header ke file `layout/header.php`
- Lakukan include `layout/header.php` pada file `index.php`

## Task #4
- Memindahkan source code bagian sidebar ke file `layout/sidebar-menu.php`
- Lakukan include `layout/sidebar-menu.php` pada file `index.php`

## Task #5
- Memindahkan source code bagian footer ke file `layout/footer.php`
- Lakukan include `layout/footer.php` pada file `index.php`

## Task #6
- Buatlah file `404.php` dengan copy source code dari `beranda.php`
	- Pada bagian `div.page-title`, ubah menjadi: `<h3>Error 404</h3>`
	- Pada bagian `div.page-content`, ubah menjadi:
- "Halaman Tidak Ditemukan!" dengan Tag Heading Lv4
- "Ups! Halaman yang Anda cari tidak ditemukan. Silahkan gunakan menu navigasi disamping kiri." dengan Tag Paragraph

## Task #7
- Create database sesuai model yang disediakan
- Lakukan insert minimal 1 baris pada tabel Kategori, Penulis, Penerbit

## Task #8
- CRUD Kategori
- Tambahkan fitur pencarian dengan method post, tampilkan hasil tanpa limit
- Tambahkan fitur pagination dengan limit 5
- Uji pagination dengan menambahkan setidaknya 6 data

## Task #9
- CRUD Penulis
- Tambahkan fitur pencarian dengan method post, tampilkan hasil tanpa limit
- Tambahkan fitur pagination dengan limit 5
- Uji pagination dengan menambahkan setidaknya 6 data

## Task #10
- CRUD Penerbit
- Tambahkan fitur pencarian dengan method post, tampilkan hasil tanpa limit
- Tambahkan fitur pagination dengan limit 5
- Uji pagination dengan menambahkan setidaknya 6 data

# Proyek 5

## Task #11
- CRUD Buku
- Tambahkan fitur pencarian dengan method post, tampilkan hasil tanpa limit
- Tambahkan fitur pagination dengan limit 5
- Uji pagination dengan menambahkan setidaknya 6 data
- Rule:
	- CRUD Kategori, Penulis, Penerbit harus diselesaikan lebih dahulu
	- Data untuk Kategori, Penulis, Penerbit harus tersedia, minimal 1 baris agar bisa melakukan CRUD Buku

## Task #12
- C (Create) Peminjaman (dari table Transaksi)
- Buatlah form tambah peminjaman
- Form yang dibuat hanya menampilkan buku-buku yang statusnya `Tersedia`
- Pastikan status buku yang dipinjam berubah (`Tersedia` -> `Dipinjam`)
- Tambahkan data minimal 2 data

## Task #13
- Tambahkan folder `helpers` dengan tingkat hirarki `L1`
- Buat file `helper_umum.php`
- Buat fungsi dengan nama `_d()` disertai 1 parameter/ argumen `$str`
- Source code pada fungsi tersebut berisikan:
```
	echo '<pre>';
	var_dump($str);
	echo '</pre>';
```
- Fungsi `_d()` ditujukan untuk memudahkan proses dump/identifikasi nilai dari suatu variable

## Task #14
- Menggunakan variable konfigurasi (`config/konfigurasi-umum.php`) yang telah didefinisikan:
	- Judul Situs: `$_SITE_TITLE`
	- Deskripsi Alamat: `$_SITE_DESC_ADDRESS`
	- Deskripsi Telepon: `$_SITE_DESC_PHONE`
	- Info Situs: `$_SITE_INFO`
	- Credit Situs: `$_SITE_CREDIT`
	- Path Aplikasi: `$_PATH_APP`
	- Path Gambar: `$_PATH_IMAGE`
	- Query Limit: `$_QUERY_LIMIT`
- Silahkan cari dan gunakan secara mandiri, dimana saja variable konfigurasi ini perlu digunakan!

## Task #15
- Tambahkan include `koneksi-db.php` hanya pada satu file saja, yaitu `index.php`
- Letakkan diposisi atas pada block code php
- Lalu hapus semua `koneksi-db.php` yang ada pada setiap file yang diakses melalui `index.php`
- Dengan begitu cukup melakukan satu kali include `koneksi-db.php`

## Task #16
- Tambahkan class `.active` untuk setiap menu yang dipilih/aktif pada menu sidebar
- Perhatikan pada file `style.css` terdapat class `nav ul li a.active` yang sudah didefinisikan
- Gunakan JS untuk memeriksa halaman yang sedang aktif dan gunakan `class .active` pada menu
- Tuliskan code JS pada file `app.js`

## Task #17
- CRUD Peminjaman
- Tambahkan fitur pencarian dengan method post, tampilkan hasil tanpa limit
- Tambahkan fitur pagination dengan limit 5
- Uji pagination dengan menambahkan setidaknya 11 data
- Tambahkan menu cetak data peminjaman
- Rule:
	- Peminjaman tidak dapat dihapus, hanya dapat diubah
- Referensi: Flowchart Peminjaman

## Task #18
- CRUD Pengembalian
- Tambahkan fitur pencarian dengan method post, tampilkan hasil tanpa limit
- Tambahkan fitur pagination dengan limit 5
- Uji pagination dengan menambahkan setidaknya 11 data
- Tambahkan menu cetak data pengembalian
- Rule:
	- Pengembalian tidak dapat diubah, hanya dapat dihapus
	- Jika pengembalian dihapus atau batal, maka transaksi `tanggal_kembali` menjadi `0000-00-00` dan `status` pada buku menjadi `Dipinjam`
	- Proses penghapusan atau pembatalan pengembalian harus memeriksa kondisi bahwa buku yang dipinjam tidak tidak dalam status `Tersedia`
- Referensi: Flowchart Pengembalian

## Task #19
- Buatlah procedure `pagination()` pada file `helper_umum.php`
- Terdapat 4 parameter untuk procedure tersebut, yaitu: `$row`, `$menu`, `$menu`, `$limit`
- Gunakan procedure tersebut pada setiap halaman yang menampilkan data dalam bentuk tabel, yaitu anggota, kategori, penulis, penerbit, buku, peminjaman & pengembalian.

## Task #20
- Buatkan file terpisah untuk `layout/container.php`
- Sehingga pada file `index.php` hanya melakukan include `layout/container.php`
- File `layout/container.php` berisikan source code untuk memproses request `$_GET['p']` yang telah ada pada file `index.php`

## Task #21
- Pada bagian `layout/footer.php` menampilkan tahun 2021. Gunakan function native pada PHP sehingga tahun yang ditampilkan menjadi dinamis dengan nilai tahun aktual saat ini.

# Proyek 6

## Task #22
- Deploy seluruh hasil pekerjaan Anda baik Aplikasi dan Basis Data di hosting!
- Silahkan gunakan hosting gratis seperti [000webhost](https://www.000webhost.com/), [InfinityFree](https://www.infinityfree.net/) atau hosting lainnya yang mendukung PHP dan basis data MySQL, serta **harus bisa diakses melalui domain/sub-domain/IP Public**
- Diperbolehkan menggunakan hosting pribadi jika memiliki, namun lebih direkomendasikan menggunakan hosting gratis.

# Catatan

## Referensi
Requirement Proyek Sistem Informasi Perpustakaan ini dapat dilihat pada tautan: [https://bit.ly/vsga-jwd-req-perpus](https://bit.ly/vsga-jwd-req-perpus)

## Ketentuan Pengumpulan
Bagi peserta VSGA JWD 2022, silahkan kumpulkan seluruh proyek pada LMS Kominfo dan harus membaca ketentuan dan instruksi yang diberikan pada Assignment Proyek masing-masing.

## Pembelajar Selain Peserta Pelatihan
Sumber kode ini terbuka, tidak terbatas hanya untuk peserta VSGA JWD 2022, namun bagi siapapun yang ingin belajar pemograman web menggunakan bahasa pemograman PHP.
