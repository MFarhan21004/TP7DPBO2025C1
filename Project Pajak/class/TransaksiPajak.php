<?php

require_once 'config/database.php';

class TransaksiPajak {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllTransaksiPajak() {
        $stmt = $this->db->query("
            SELECT t.id_transaksi, wp.nama AS nama_wp, jp.nama_pajak, t.tanggal_bayar, t.jumlah_bayar
            FROM TransaksiPajak t
            JOIN WajibPajak wp ON t.id_wp = wp.id_wp
            JOIN JenisPajak jp ON t.id_jenis = jp.id_jenis
            ORDER BY t.id_transaksi ASC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertTransaksipajak($id_wp, $id_jenis, $tanggal_bayar, $jumlah_bayar) {
        $stmt = $this->db->prepare("
            INSERT INTO TransaksiPajak (id_wp, id_jenis, tanggal_bayar, jumlah_bayar)
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([$id_wp, $id_jenis, $tanggal_bayar, $jumlah_bayar]);
    }

    public function deleteTransaksipajak($id_transaksi) {
        $stmt = $this->db->prepare("DELETE FROM TransaksiPajak WHERE id_transaksi = ?");
        return $stmt->execute([$id_transaksi]);
    }

    public function getByTransaksipajakId($id_transaksi) {
        $stmt = $this->db->prepare("SELECT * FROM TransaksiPajak WHERE id_transaksi = ?");
        $stmt->execute([$id_transaksi]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateTransaksipajak($id_transaksi, $id_wp, $id_jenis, $tanggal_bayar, $jumlah_bayar) {
        $stmt = $this->db->prepare("
            UPDATE TransaksiPajak SET id_wp=?, id_jenis=?, tanggal_bayar=?, jumlah_bayar=? 
            WHERE id_transaksi=?
        ");
        return $stmt->execute([$id_wp, $id_jenis, $tanggal_bayar, $jumlah_bayar, $id_transaksi]);
    }

    public function searchTransaksiPajak($search) {
        $search = "%" . $search . "%"; // Menambahkan wildcard untuk pencarian LIKE
        $query = "SELECT t.id_transaksi, wp.nama AS nama_wp, jp.nama_pajak, t.tanggal_bayar, t.jumlah_bayar
                  FROM transaksipajak t
                  JOIN wajibpajak wp ON t.id_wp = wp.id_wp
                  JOIN jenispajak jp ON t.id_jenis = jp.id_jenis
                  WHERE wp.nama LIKE ? OR jp.nama_pajak LIKE ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$search, $search]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>
