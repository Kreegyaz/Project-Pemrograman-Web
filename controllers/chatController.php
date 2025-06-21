<?php
require_once __DIR__ . '/../models/chat.php';

class ChatController {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function index() {
        $chat = new Chat($this->koneksi);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['message'])) {
            $chat->send($_SESSION['user']['id'], $_POST['message']);
            header("Location: index.php?page=chat");
            exit;
        }

        $messages = $chat->getAll();
        include __DIR__ . '/../view/chat/index.php';
    }
}
