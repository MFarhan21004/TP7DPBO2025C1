<?php

require_once 'config/database.php';

class JenisPajak {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllJenisPajak() {
        $stmt = $this->db->query("SELECT * FROM JenisPajak ORDER BY id_jenis ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertJenisPajak($nama_pajak, $tarif_persen) {
        $stmt = $this->db->prepare("INSERT INTO JenisPajak (nama_pajak, tarif_persen) VALUES (?, ?)");
        return $stmt->execute([$nama_pajak, $tarif_persen]);
    }

    public function deleteJenisPajak($id_jenis) {
        $stmt = $this->db->prepare("DELETE FROM JenisPajak WHERE id_jenis = ?");
        return $stmt->execute([$id_jenis]);
    }

    public function getJenisPajakById($id_jenis) {
        $stmt = $this->db->prepare("SELECT * FROM JenisPajak WHERE id_jenis = ?");
        $stmt->execute([$id_jenis]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateJenisPajak($id_jenis, $nama_pajak, $tarif_persen) {
        $stmt = $this->db->prepare("UPDATE JenisPajak SET nama_pajak = ?, tarif_persen = ? WHERE id_jenis = ?");
        return $stmt->execute([$nama_pajak, $tarif_persen, $id_jenis]);
    }
}
?>
