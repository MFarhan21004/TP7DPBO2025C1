<h3>Daftar Transaksi Pajak</h3>
<table border="1">
    <tr>
        <th>ID Transaksi</th>
        <th>Nama Wajib Pajak</th>
        <th>Nama Jenis Pajak</th>
        <th>Tanggal Bayar</th>
        <th>Jumlah Bayar</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($transaksiPajak->getAllTransaksiPajak() as $row): ?>
    <tr>
        <td><?= $row['id_transaksi'] ?></td>
        <td><?= $row['nama_wp'] ?></td>
        <td><?= $row['nama_pajak'] ?></td>
        <td><?= $row['tanggal_bayar'] ?></td>
        <td><?= $row['jumlah_bayar'] ?></td>
        <td>
            <a href="index.php?page=crud_transaksipajak&action=edit&id=<?= $row['id_transaksi'] ?>">Edit</a> | 
            <a href="index.php?page=crud_transaksipajak&action=delete&id=<?= $row['id_transaksi'] ?>" onclick="return confirm('Hapus transaksi ini?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<div class="form-container">

    <!-- Form Tambah Transaksi Pajak -->
    <div>
        <h3>Tambah Transaksi Pajak</h3>
        <form action="index.php?page=crud_transaksipajak&action=add" method="POST">
            <label>ID Wajib Pajak:</label><br>
            <select name="id_wp" required>
                <?php foreach ($wp->getAllWajibPajak() as $data): ?>
                    <option value="<?= $data['id_wp'] ?>">
                        <?= $data['id_wp'] ?> - <?= $data['nama'] ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label>Jenis Pajak:</label><br>
            <select name="id_jenis" required>
                <?php foreach ($jenisPajak->getAllJenisPajak() as $data): ?>
                    <option value="<?= $data['id_jenis'] ?>">
                        <?= $data['id_jenis'] ?> - <?= $data['nama_pajak'] ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label>Tanggal Bayar:</label><br>
            <input type="date" name="tanggal_bayar" required><br>

            <label>Jumlah Bayar:</label><br>
            <input type="number" step="0.01" name="jumlah_bayar" required><br><br>

            <input type="submit" value="Tambah">
        </form>
    </div>

    <!-- Form Edit Transaksi Pajak -->
    <?php if (isset($transaksi_edit)): ?>
    <div>
        <h3>Edit Transaksi Pajak</h3>
        <form action="index.php?page=crud_transaksipajak&action=update&id=<?= $transaksi_edit['id_transaksi'] ?>" method="POST">
            <label>ID Wajib Pajak:</label><br>
            <select name="id_wp" required>
                <?php foreach ($wp->getAllWajibPajak() as $data): ?>
                    <option value="<?= $data['id_wp'] ?>" <?= $data['id_wp'] == $transaksi_edit['id_wp'] ? 'selected' : '' ?>>
                        <?= $data['id_wp'] ?> - <?= $data['nama'] ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label>Jenis Pajak:</label><br>
            <select name="id_jenis" required>
                <?php foreach ($jenisPajak->getAllJenisPajak() as $data): ?>
                    <option value="<?= $data['id_jenis'] ?>" <?= $data['id_jenis'] == $transaksi_edit['id_jenis'] ? 'selected' : '' ?>>
                        <?= $data['id_jenis'] ?> - <?= $data['nama_pajak'] ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label>Tanggal Bayar:</label><br>
            <input type="date" name="tanggal_bayar" value="<?= $transaksi_edit['tanggal_bayar'] ?>" required><br>

            <label>Jumlah Bayar:</label><br>
            <input type="number" step="0.01" name="jumlah_bayar" value="<?= $transaksi_edit['jumlah_bayar'] ?>" required><br><br>

            <input type="submit" value="Update">
        </form>
    </div>
    <?php endif; ?>

</div>
