<h3>Daftar Wajib Pajak</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>NIK</th>
        <th>Alamat</th>
        <th>No HP</th>
    </tr>
    <?php foreach ($wp->getAllWajibPajak() as $wp): ?>
    <tr>
        <td><?= $wp['id_wp'] ?></td>
        <td><?= $wp['nama'] ?></td>
        <td><?= $wp['nik'] ?></td>
        <td><?= $wp['alamat'] ?></td>
        <td><?= $wp['no_hp'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
