<h3>Daftar Transaksi Pajak</h3>

<!-- Form Pencarian dan Tombol Lihat Semua -->
<form action="index.php?page=transaksipajak" method="GET">
    <input type="hidden" name="page" value="transaksipajak"> <!-- Menjaga agar halaman tetap pada 'transaksipajak' -->
    <label for="search">Cari berdasarkan Nama Wajib Pajak atau Nama Pajak:</label>
    <input type="text" name="search" id="search" placeholder="Masukkan Nama Wajib Pajak atau Nama Pajak" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
    <input type="submit" value="Cari">
    
    <!-- Tombol Lihat Semua -->
    <?php if (isset($_GET['search']) && !empty($_GET['search'])): ?>
        <a href="index.php?page=transaksipajak" style="margin-left: 10px;">Lihat Semua</a>
    <?php endif; ?>
</form>


<table border="1">
    <tr>
        <th>ID Transaksi</th>
        <th>Nama Wajib Pajak</th>
        <th>Nama Jenis Pajak</th>
        <th>Tanggal Bayar</th>
        <th>Jumlah Bayar</th>
    </tr>
    <?php
    // Menangani Pencarian
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $_GET['search'];
        // Memanggil fungsi pencarian di kelas transaksiPajak
        $transaksi = $transaksiPajak->searchTransaksiPajak($search);
    } else {
        // Menampilkan semua transaksi jika tidak ada pencarian
        $transaksi = $transaksiPajak->getAllTransaksiPajak();
    }

    // Menampilkan hasil transaksi yang ditemukan
    foreach ($transaksi as $row): ?>
    <tr>
        <td><?= $row['id_transaksi'] ?></td>
        <td><?= $row['nama_wp'] ?></td>
        <td><?= $row['nama_pajak'] ?></td>
        <td><?= $row['tanggal_bayar'] ?></td>
        <td><?= $row['jumlah_bayar'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
