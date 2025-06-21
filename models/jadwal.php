<?php
class Jadwal {
    function getAll() {
        global $koneksi;
        return $koneksi->query("SELECT * FROM jadwal ORDER BY tanggal DESC");
    }
    function create($data) {
        global $koneksi;
        $stmt = $koneksi->prepare("INSERT INTO jadwal (judul, tanggal, deskripsi) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $data['judul'], $data['tanggal'], $data['deskripsi']);
        return $stmt->execute();
    }
}