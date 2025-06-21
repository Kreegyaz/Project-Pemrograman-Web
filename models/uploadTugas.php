<?php
class UploadTugas {
    private $db;

    public function __construct($koneksi) {
        $this->db = $koneksi;
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO upload_tugas (user_id, jadwal_tugas_id, file_path, text_submission) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $data['user_id'], $data['jadwal_tugas_id'], $data['file_path'], $data['text_submission']);
        return $stmt->execute();
    }

    public function getAll() {
        $result = $this->db->query("SELECT upload_tugas.*, users.nama, jadwal_tugas.nama_tugas FROM upload_tugas JOIN users ON upload_tugas.user_id = users.id JOIN jadwal_tugas ON upload_tugas.jadwal_tugas_id = jadwal_tugas.id ORDER BY uploaded_at DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllByUserId($userId) {
        $query = "
            SELECT 
                upload_tugas.*, 
                users.nama, 
                jadwal_tugas.nama_tugas 
            FROM 
                upload_tugas 
            JOIN 
                users ON upload_tugas.user_id = users.id 
            JOIN 
                jadwal_tugas ON upload_tugas.jadwal_tugas_id = jadwal_tugas.id 
            WHERE 
                upload_tugas.user_id = ? 
            ORDER BY 
                uploaded_at DESC";
        
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }


}