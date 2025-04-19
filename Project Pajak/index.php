<?php

require_once 'RoutAndControl.php';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Pembayaran Pajak</title>
    <link rel="stylesheet" href="style.css"> <!-- Style tambahan jika perlu -->
</head>
<body>
    <?php include 'view/header.php'; ?>
    
    <main>
        <br>
        <nav>
            <a href="?page=wajibpajak">Wajib Pajak</a> |
            <a href="?page=jenispajak">Jenis Pajak</a> |
            <a href="?page=transaksipajak">Transaksi Pajak</a> |
            <a href="?page=crud_wajibpajak">Admin CRUD Wajib Pajak</a> |
            <a href="?page=crud_jenispajak">Admin CRUD Jenis Pajak</a> |
            <a href="?page=crud_transaksipajak">Admin CRUD Transaksi Pajak</a> <!-- Menambahkan link CRUD Jenis Pajak dan Transaksi Pajak -->
        </nav>

        <?php
        // Menampilkan view sesuai halaman
        if ($page == 'wajibpajak') {
            include 'view/v_wajibpajak.php';
        } elseif ($page == 'jenispajak') {
            include 'view/v_jenispajak.php';
        } elseif ($page == 'transaksipajak') {
            include 'view/v_transaksipajak.php';
        } elseif ($page == 'crud_wajibpajak') {
            include 'view/Crud_WP.php';  // Halaman CRUD Wajib Pajak
        } elseif ($page == 'crud_jenispajak') {
            include 'view/Crud_JP.php';  // Halaman CRUD Jenis Pajak
        } elseif ($page == 'crud_transaksipajak') {
            include 'view/Crud_TP.php';  // Halaman CRUD Transaksi Pajak
        } else {
            echo "<p>Silakan pilih menu di atas untuk memulai.</p>";
        }
        ?>
    </main>

    <?php include 'view/footer.php'; ?>
</body>
</html>

