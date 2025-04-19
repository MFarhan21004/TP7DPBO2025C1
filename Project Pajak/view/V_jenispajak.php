<h3>Daftar Jenis Pajak</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama Pajak</th>
        <th>Tarif (%)</th>
    </tr>
    <?php foreach ($jenisPajak->getAllJenisPajak() as $jenis): ?>
    <tr>
        <td><?= $jenis['id_jenis'] ?></td>
        <td><?= $jenis['nama_pajak'] ?></td>
        <td><?= $jenis['tarif_persen'] ?>%</td>
    </tr>
    <?php endforeach; ?>
</table>
