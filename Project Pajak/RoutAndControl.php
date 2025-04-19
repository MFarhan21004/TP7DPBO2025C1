<?php

// Memasukkan file kelas yang diperlukan
require_once 'class/WajibPajak.php';
require_once 'class/JenisPajak.php';
require_once 'class/TransaksiPajak.php';

// Membuat objek untuk setiap kelas
$wp = new WajibPajak();
$jenisPajak = new JenisPajak();
$transaksiPajak = new TransaksiPajak();

$action = $_GET['action'] ?? '';
$page = $_GET['page'] ?? '';

/* -------------------- Wajib Pajak -------------------- */
// READ - bisa diakses dari kedua halaman
if ($page == 'wajibpajak' || $page == 'crud_wajibpajak') {
    $data_wajibpajak = $wp->getAllWajibPajak();
}

// CRUD - hanya bisa dilakukan jika page = crud_wajibpajak
if ($page == 'crud_wajibpajak') {
    if ($action == 'add' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $wp->insertWajibPajak($_POST['nama'], $_POST['nik'], $_POST['alamat'], $_POST['no_hp']);
        // Redirect ke halaman wajibpajak setelah tambah
        header('Location: index.php?page=crud_wajibpajak');
        exit;
    }

    if ($action == 'delete' && isset($_GET['id'])) {
        $wp->deleteWajibPajak($_GET['id']);
        // Redirect ke halaman wajibpajak setelah delete
        header('Location: index.php?page=crud_wajibpajak');
        exit;
    }

    if ($action == 'edit' && isset($_GET['id'])) {
        $wp_edit = $wp->getWajibPajakById($_GET['id']);
    }

    if ($action == 'update' && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
        $wp->updateWajibPajak($_GET['id'], $_POST['nama'], $_POST['alamat'], $_POST['no_hp']);
        // Redirect ke halaman wajibpajak setelah update
        header('Location: index.php?page=crud_wajibpajak');
        exit;
    }
}

/* -------------------- Jenis Pajak -------------------- */
// READ
if ($page == 'jenispajak' || $page == 'crud_jenispajak') {
    $data_jenispajak = $jenisPajak->getAllJenisPajak();
}

// CRUD
if ($page == 'crud_jenispajak') {
    if ($action == 'add' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $jenisPajak->insertJenisPajak($_POST['nama_pajak'], $_POST['tarif_persen']);
        // Redirect ke halaman jenispajak setelah tambah
        header('Location: index.php?page=crud_jenispajak');
        exit;
    }

    if ($action == 'delete' && isset($_GET['id'])) {
        $jenisPajak->deleteJenisPajak($_GET['id']);
        // Redirect ke halaman jenispajak setelah delete
        header('Location: index.php?page=crud_jenispajak');
        exit;
    }

    if ($action == 'edit' && isset($_GET['id'])) {
        $jenis_pajak_edit = $jenisPajak->getJenisPajakById($_GET['id']);
    }

    if ($action == 'update' && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
        $jenisPajak->updateJenisPajak($_GET['id'], $_POST['nama_pajak'], $_POST['tarif_persen']);
        // Redirect ke halaman jenispajak setelah update
        header('Location: index.php?page=crud_jenispajak');
        exit;
    }
}

/* -------------------- Transaksi Pajak -------------------- */
// READ
if ($page == 'transaksipajak' || $page == 'crud_transaksipajak') {
    $data_transaksipajak = $transaksiPajak->getAllTransaksipajak();
}

// CRUD
if ($page == 'crud_transaksipajak') {
    if ($action == 'add' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $transaksiPajak->insertTransaksipajak(
            $_POST['id_wp'], $_POST['id_jenis'], $_POST['tanggal_bayar'], $_POST['jumlah_bayar']
        );
        // Redirect ke halaman transaksipajak setelah tambah
        header('Location: index.php?page=crud_transaksipajak');
        exit;
    }

    if ($action == 'delete' && isset($_GET['id'])) {
        $transaksiPajak->deleteTransaksipajak($_GET['id']);
        // Redirect ke halaman transaksipajak setelah delete
        header('Location: index.php?page=crud_transaksipajak');
        exit;
    }

    if ($action == 'edit' && isset($_GET['id'])) {
        $transaksi_edit = $transaksiPajak->getByTransaksipajakId($_GET['id']);
        $wp_data = $wp->getAllWajibPajak();
        $jp_data = $jenisPajak->getAllJenisPajak();
    }

    if ($action == 'update' && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
        $transaksiPajak->updateTransaksipajak(
            $_GET['id'], $_POST['id_wp'], $_POST['id_jenis'], $_POST['tanggal_bayar'], $_POST['jumlah_bayar']
        );
        // Redirect ke halaman transaksipajak setelah update
        header('Location: index.php?page=crud_transaksipajak');
        exit;
    }
}

?>