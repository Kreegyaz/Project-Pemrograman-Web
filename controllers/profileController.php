<?php
class ProfileController {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function index() {
        $user = $_SESSION['user']; // ambil data user dari session
        include __DIR__ . '/../view/profile/index.php'; // tampilkan view
    }
     public function edit() {
        $userModel = new User($this->koneksi);
        $user = $_SESSION['user'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nama'     => $_POST['nama'],
                'email'    => $_POST['email'],
                'prodi'    => $_POST['prodi'],
                'angkatan' => $_POST['angkatan'],
            ];

            if ($userModel->update($user['id'], $data)) {
                // Update session juga biar nggak perlu login ulang
                $_SESSION['user'] = $userModel->getById($user['id']);
                header("Location: index.php?page=profile");
                exit;
            } else {
                $error = "Gagal memperbarui profil.";
            }
        }

        include __DIR__ . '/../view/profile/editProfile.php';
    }
    public function delete(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userModel = new User($this->koneksi);
        $userId = $_SESSION['user']['id'];

        if ($userModel->deleteById($userId)) {
            session_destroy();
            header("Location: index.php?page=login");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Gagal menghapus akun.</div>";
        }
    }
}
}
