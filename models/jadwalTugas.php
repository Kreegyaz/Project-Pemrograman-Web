<?php
// models/jadwalTugas.php
class JadwalTugas {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function getAll() {
        $result = $this->koneksi->query("SELECT * FROM jadwal_tugas ORDER BY deadline ASC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
    $stmt = $this->koneksi->prepare("SELECT * FROM jadwal_tugas WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}


    public function create($data) {
        $stmt = $this->koneksi->prepare("INSERT INTO jadwal_tugas (nama_tugas, deskripsi_tugas, modul, deadline) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $data['nama_tugas'], $data['deskripsi_tugas'], $data['modul'], $data['deadline']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $stmt = $this->koneksi->prepare("UPDATE jadwal_tugas SET nama_tugas = ?, deskripsi_tugas = ?, modul = ?, deadline = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $data['nama_tugas'], $data['deskripsi_tugas'], $data['modul'], $data['deadline'], $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->koneksi->prepare("DELETE FROM jadwal_tugas WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
