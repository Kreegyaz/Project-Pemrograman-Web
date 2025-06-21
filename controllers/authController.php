<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function login() {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User($this->koneksi);
            $userData = $user->findByEmail($_POST['email']);

            if ($userData && password_verify($_POST['password'], $userData['password'])) {
                $_SESSION['user'] = $userData;
                header("Location: index.php?page=dashboard");
                exit;
            } else {
                $error = "Email atau password salah!";
            }
        }

        include __DIR__ . '/../view/auth/login.php';
    }

   public function register() {

    $error = '';
    $success = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        

        if ($_POST['password'] !== $_POST['confirm_password']) {
            $error = "Password tidak cocok!";
        } else {
            $user = new User($this->koneksi);

            $data = [
                'nama' => $_POST['nama'],
                'nim' => $_POST['nim'],
                'prodi' => $_POST['prodi'],
                'angkatan' => $_POST['angkatan'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            ];

            if ($user->findByEmail($data['email'])) {
                $error = "Email sudah digunakan.";
            } elseif ($user->findByNIM($data['nim'])) {
                $error = "NIM sudah digunakan.";
            } else {
                if ($user->create($data)) {
                    $success = "Registrasi berhasil!";
                } else {
                    $error = "Registrasi gagal!";
                }
            }
        }
    }

    include __DIR__ . '/../view/auth/register.php';
}



    public function logout() {
        session_destroy();
        header("Location: index.php?page=login");
        exit;
    }
}
