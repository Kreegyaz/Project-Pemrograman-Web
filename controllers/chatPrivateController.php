<?php
// controllers/chatPrivateController.php
require_once __DIR__ . '/../models/chatPrivate.php';
require_once __DIR__ . '/../models/User.php';

class ChatPrivateController {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

      public function index() {
        $userModel = new User($this->koneksi);
        $users = $userModel->getAllExcept($_SESSION['user']['id']);
        include __DIR__ . '/../view/chat/chatPrivate.php';
    }

    public function conversation() {
    $chatModel = new ChatPrivate($this->koneksi);
    $receiver_id = $_GET['user_id'] ?? $_GET['to'] ?? null;
    if (!$receiver_id) {
        echo "User tidak ditemukan.";
        return;
    }

    $userModel = new User($this->koneksi);
    $receiver = $userModel->getById($receiver_id); // pastikan usernya ada

    if (!$receiver) {
        echo "User tidak ditemukan.";
        return;
    }

    $messages = $chatModel->getMessages($_SESSION['user']['id'], $receiver_id);
    include __DIR__ . '/../view/chat/conversation.php';
}
    public function send() {
        $chatModel = new ChatPrivate($this->koneksi);

        $sender_id = $_SESSION['user']['id'];
        $receiver_id = $_POST['receiver_id'];
        $message = $_POST['message'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['message'])) {
            // ... kirim pesan
        } else {
            echo "Pesan tidak boleh kosong.";
        }

        $chatModel->sendMessage($sender_id, $receiver_id, $message);
        header("Location: index.php?page=chatPrivate-conversation&to=$receiver_id");
        exit;
    }
}
