

## ✅ Janji

Saya **Muhammad Farhan** dengan **NIM 2309323** mengerjakan Tugas Praktikum 7 dalam mata kuliah **Desain dan Pemrograman Berorientasi Objek** untuk keberkahan-Nya. Maka saya **tidak melakukan kecurangan** seperti yang telah dispesifikasikan.  
**Aamiin.**

---

## 📊 Diagram

![Diagram](https://github.com/user-attachments/assets/2683e2d7-1b66-48fb-85fe-aa44ba6bcbc5)

---

## 📌 Penjelasan Program
Program ini merupakan aplikasi web sederhana berbasis PHP yang bertujuan untuk membantu pengelolaan data pembayaran pajak. Aplikasi ini memiliki tiga entitas utama: Wajib Pajak, Jenis Pajak, dan Transaksi Pajak. Melalui aplikasi ini, pengguna dapat:

- Melihat daftar Wajib Pajak, Jenis Pajak, dan Transaksi Pajak

- Menambahkan, mengedit, dan menghapus data melalui halaman CRUD

- Menampilkan informasi secara terstruktur berdasarkan hubungan antar tabel di database

Tujuan dari aplikasi ini adalah untuk memudahkan pencatatan pembayaran pajak secara digital, meminimalisir kesalahan pencatatan manual, serta memberikan gambaran yang jelas mengenai siapa yang membayar pajak, jenis pajaknya, dan kapan pembayaran dilakukan.

### 1. Tabel `WajibPajak`

Berisi data wajib pajak (orang atau entitas yang harus membayar pajak).

**Kolom:**
- `id_wp` *(integer)*: Primary key, pengidentifikasi unik wajib pajak
- `nama` *(varchar(100))*: Nama wajib pajak
- `nik` *(char(16))*: Nomor identitas wajib pajak
- `alamat` *(text)*: Alamat wajib pajak
- `no_hp` *(varchar(15))*: Nomor telepon wajib pajak

### 2. Tabel `JenisPajak`

Berisi informasi tentang berbagai jenis pajak.

**Kolom:**
- `id_jenis` *(integer)*: Primary key
- `nama_pajak` *(varchar(100))*: Deskripsi jenis pajak
- `tarif_persen` *(decimal(5,2))*: Tarif pajak dalam persen

### 3. Tabel `TransaksiPajak`

Mencatat transaksi pembayaran pajak.

**Kolom:**
- `id_transaksi` *(integer)*: Primary key
- `id_wp` *(integer)*: Foreign key ke `WajibPajak`
- `id_jenis` *(integer)*: Foreign key ke `JenisPajak`
- `tanggal_bayar` *(date)*: Tanggal pembayaran
- `jumlah_bayar` *(decimal(15,2))*: Jumlah uang yang dibayarkan

### 🔗 Relasi Antar Tabel

- `TransaksiPajak.id_wp` → `WajibPajak.id_wp`
- `TransaksiPajak.id_jenis` → `JenisPajak.id_jenis`

> Skema ini memungkinkan sistem melacak: siapa yang membayar, jenis pajak, tanggal, dan jumlah yang dibayarkan.

---

## 📁 Struktur Folder

![Struktur File](https://github.com/user-attachments/assets/47138263-408c-4250-a7d8-6af3b4598e7d)

### Folder `class/`
- `JenisPajak.php`: Class untuk jenis pajak
- `TransaksiPajak.php`: Class untuk transaksi
- `WajibPajak.php`: Class untuk wajib pajak

### Folder `config/`
- `database.php`: Konfigurasi koneksi database

### Folder `database/`
- `pembayaran_pajak.sql`: File skema database

### Folder `view/`
- `Crud_JP.php`, `Crud_TP.php`, `Crud_WP.php`: Halaman CRUD
- `V_jenispajak.php`, `V_transaksipajak.php`, `V_wajibpajak.php`: Tampilan data
- `header.php`, `footer.php`: Template


### File lainnya
- `index.php`: Halaman utama
- `style.css`: Styling aplikasi
- `RoutAndControl.php`: Routing dan kontrol

---

## 🔁 Alur Program

- User memilih halaman entitas (`WajibPajak`, `JenisPajak`, atau `TransaksiPajak`)
- Jika halaman **tanpa CRUD**, hanya bisa **melihat data**
- Jika halaman **CRUD**, bisa **menambah, mengubah, dan menghapus data**

---

## 📸 Dokumentasi

https://github.com/user-attachments/assets/1c322814-4265-42e7-9572-478fc387efb1  

---

