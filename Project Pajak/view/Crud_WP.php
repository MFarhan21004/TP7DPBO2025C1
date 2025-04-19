<h3>Daftar Wajib Pajak</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>NIK</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($wp->getAllWajibPajak() as $wp): ?>
    <tr>
        <td><?= $wp['id_wp'] ?></td>
        <td><?= $wp['nama'] ?></td>
        <td><?= $wp['nik'] ?></td>
        <td><?= $wp['alamat'] ?></td>
        <td><?= $wp['no_hp'] ?></td>
        <td>        
            <a href="index.php?page=crud_wajibpajak&action=edit&id=<?= $wp['id_wp'] ?>">Edit</a> | 
            <a href="index.php?page=crud_wajibpajak&action=delete&id=<?= $wp['id_wp'] ?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="form-container">

    <!-- Form untuk menambah Wajib Pajak -->
    <div>
        <h3>Tambah Wajib Pajak</h3>
        <form action="index.php?page=crud_wajibpajak&action=add" method="POST">
            <label>Nama: </label><br>
            <input type="text" name="nama" required><br>

            <label>NIK: </label><br>
            <input type="text" name="nik" required><br>

            <label>Alamat: </label><br>
            <input type="text" name="alamat" required><br>

            <label>No HP: </label><br>
            <input type="text" name="no_hp" required><br><br>

            <input type="submit" value="Tambah">
        </form>
    </div>

    <!-- Form untuk mengedit Wajib Pajak -->
    <?php if (isset($wp_edit)): ?>
    <div>
        <h3>Edit Wajib Pajak</h3>
        <form action="index.php?page=crud_wajibpajak&action=update&id=<?= $wp_edit['id_wp'] ?>" method="POST">
            <label>Nama: </label><br>
            <input type="text" name="nama" value="<?= $wp_edit['nama'] ?>" required><br>

            <label>Alamat: </label><br>
            <input type="text" name="alamat" value="<?= $wp_edit['alamat'] ?>" required><br>

            <label>No HP: </label><br>
            <input type="text" name="no_hp" value="<?= $wp_edit['no_hp'] ?>" required><br><br>

            <input type="submit" value="Update">
        </form>
    </div>
    <?php endif; ?>

</div>
