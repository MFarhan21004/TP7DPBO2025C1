<?php

require_once 'config/database.php';

class WajibPajak {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllWajibPajak() {
        $stmt = $this->db->query("SELECT * FROM WajibPajak ORDER BY id_wp ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertWajibPajak($nama, $nik, $alamat, $no_hp) {
        $stmt = $this->db->prepare("INSERT INTO WajibPajak (nama, nik, alamat, no_hp) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nama, $nik, $alamat, $no_hp]);
    }

    public function deleteWajibPajak($id_wp) {
        $stmt = $this->db->prepare("DELETE FROM WajibPajak WHERE id_wp = ?");
        return $stmt->execute([$id_wp]);
    }

    public function getWajibPajakById($id_wp) {
        $stmt = $this->db->prepare("SELECT * FROM WajibPajak WHERE id_wp = ?");
        $stmt->execute([$id_wp]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateWajibPajak($id_wp, $nama, $alamat) {
        $stmt = $this->db->prepare("UPDATE WajibPajak SET nama = ?, alamat = ? WHERE id_wp = ?");
        return $stmt->execute([$nama, $alamat, $id_wp]);
    }
}
?>
