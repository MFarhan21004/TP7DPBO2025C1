<h3>Daftar Jenis Pajak</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama Pajak</th>
        <th>Tarif (%)</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($jenisPajak->getAllJenisPajak() as $jenis): ?>
    <tr>
        <td><?= $jenis['id_jenis'] ?></td>
        <td><?= $jenis['nama_pajak'] ?></td>
        <td><?= $jenis['tarif_persen'] ?>%</td>
        <td>
            
            <a href="index.php?page=crud_jenispajak&action=edit&id=<?= $jenis['id_jenis'] ?>">Edit</a> |
            <a href="index.php?page=crud_jenispajak&action=delete&id=<?= $jenis['id_jenis'] ?>" onclick="return confirm('Yakin ingin hapus data ini?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<br>
<div class="form-container">
    <!-- Form Tambah Jenis Pajak -->
    <div>
        <h3>Tambah Jenis Pajak</h3>
        <form action="index.php?page=crud_jenispajak&action=add" method="POST">
            <label>Nama Pajak: </label><br>
            <input type="text" name="nama_pajak" required><br>
            <label>Tarif (%): </label><br>
            <input type="number" name="tarif_persen" step="0.01" required><br><br>
            <input type="submit" value="Tambah">
        </form>
    </div>

    <!-- Form Edit Jenis Pajak -->
    <?php if (isset($jenis_pajak_edit)): ?>
    <div>
        <h3>Edit Jenis Pajak</h3>
        <form action="index.php?page=crud_jenispajak&action=update&id=<?= $jenis_pajak_edit['id_jenis'] ?>" method="POST">
            <label>Nama Pajak: </label><br>
            <input type="text" name="nama_pajak" value="<?= $jenis_pajak_edit['nama_pajak'] ?>" required><br>
            <label>Tarif (%): </label><br>
            <input type="number" name="tarif_persen" step="0.01" value="<?= $jenis_pajak_edit['tarif_persen'] ?>" required><br><br>
            <input type="submit" value="Update">
        </form>
    </div>
    <?php endif; ?>
</div>

