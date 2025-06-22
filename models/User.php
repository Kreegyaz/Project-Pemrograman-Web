<?php
class User {
    private $koneksi;
    
    public function __construct($database) {
        $this->koneksi = $database;
    }

    public function findByEmail($email) {
        $stmt = $this->koneksi->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function findByNIM($nim) {
        $stmt = $this->koneksi->prepare("SELECT * FROM users WHERE nim = ?");
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($data) {
        $password = password_hash($data['password'], PASSWORD_BCRYPT); // jangan hash 2x
        $stmt = $this->koneksi->prepare("
            INSERT INTO users (nama, nim, prodi, angkatan, email, password)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param(
            "ssssss",
            $data['nama'],
            $data['nim'],
            $data['prodi'],
            $data['angkatan'],
            $data['email'],
            $password
        );
        return $stmt->execute();
    }



    public function getById($id) {
        $stmt = $this->koneksi->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function update($id, $data) {
        $stmt = $this->koneksi->prepare("UPDATE users SET nama=?, email=?, prodi=?, angkatan=? WHERE id=?");
        $stmt->bind_param("sssii", $data['nama'], $data['email'], $data['prodi'], $data['angkatan'], $id);
        return $stmt->execute();
    }
    // models/User.php
public function deleteById($id) {
    $stmt = $this->koneksi->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
public function getAllExcept($excludeId) {
    $stmt = $this->koneksi->prepare("SELECT * FROM users WHERE id != ?");
    $stmt->bind_param("i", $excludeId);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}

}
