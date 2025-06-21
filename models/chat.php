<?php
class Chat {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function getAll() {
        $sql = "SELECT chats.*, users.nama FROM chats JOIN users ON chats.user_id = users.id ORDER BY created_at DESC";
        return $this->koneksi->query($sql);
    }

    public function send($userId, $message) {
        $stmt = $this->koneksi->prepare("INSERT INTO chats (user_id, message) VALUES (?, ?)");
        $stmt->bind_param("is", $userId, $message);
        return $stmt->execute();
    }
}
