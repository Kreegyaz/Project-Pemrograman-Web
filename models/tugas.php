<?php
class Tugas {
    function getAll() {
        global $koneksi;
        return $koneksi->query("SELECT * FROM tugas ORDER BY uploaded_at DESC");
    }
    function upload($data, $filename) {
        global $koneksi;
        $stmt = $koneksi->prepare("INSERT INTO tugas (user_id, judul, file, uploaded_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("iss", $data['user_id'], $data['judul'], $filename);
        return $stmt->execute();
    }
}
