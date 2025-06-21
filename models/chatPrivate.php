<?php
class ChatPrivate {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }
    public function index() {
    $userModel = new User($this->koneksi);
    $users = $userModel->getAllExcept($_SESSION['user']['id']); // ambil semua user kecuali diri sendiri
    include __DIR__ . '/../view/chat/index.php'; // view akan menggunakan $users
}

    public function getMessages($userId, $receiverId) {
    $stmt = $this->koneksi->prepare("
    SELECT * FROM chatprivate
    WHERE (sender_id = ? AND receiver_id = ?)
       OR (sender_id = ? AND receiver_id = ?)
    ORDER BY created_at ASC
");
    $stmt->bind_param("iiii", $userId, $receiverId, $receiverId, $userId);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

    public function sendMessage($sender_id, $receiver_id, $message) {
    $query = "INSERT INTO chatprivate (sender_id, receiver_id, message) VALUES (?, ?, ?)";
    $stmt = $this->koneksi->prepare($query);
    $stmt->bind_param("iis", $sender_id, $receiver_id, $message);
    return $stmt->execute();
}
}
