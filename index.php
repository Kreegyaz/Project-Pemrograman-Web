<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// Koneksi database
$koneksi = require_once __DIR__ . '/config/koneksi.php';

// Models
require_once __DIR__ . '/models/User.php';

// Controllers
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/jadwalTugasController.php';
require_once __DIR__ . '/controllers/ProfileController.php';
require_once __DIR__ . '/controllers/chatController.php';
require_once __DIR__ . '/controllers/chatPrivateController.php';
require_once __DIR__ . '/controllers/uploadTugasController.php';




// Routing berdasarkan parameter ?page=
$page = $_GET['page'] ?? 'login';

// Fungsi otentikasi
function isLoggedIn() {
    return isset($_SESSION['user']);
}

function requireAuth() {
    if (!isLoggedIn()) {
        header("Location: index.php?page=login");
        exit;
    }
}


function redirectIfLoggedIn() {
    if (isLoggedIn()) {
        header("Location: index.php?page=dashboard");
        exit;
    }
}

// Router
switch ($page) {
    case 'login':
         redirectIfLoggedIn();
        (new AuthController($koneksi))->login();
        break;
    case 'register':
        redirectIfLoggedIn();
        (new AuthController($koneksi))->register();
        break;
    case 'logout':
        (new AuthController($koneksi))->logout();
        break;
    case 'dashboard':
        requireAuth();
        include __DIR__ . '/view/dashboard.php';
        break;
    case 'jadwal-tugas':
        requireAuth();
        (new JadwalTugasController($koneksi))->index();
        break;

    case 'buat-jadwal-tugas':
        requireAuth();
        (new JadwalTugasController($koneksi))->create();
        break;
    case 'edit-jadwal-tugas':
        requireAuth();
        (new JadwalTugasController($koneksi))->edit();
        break;
    case 'hapus-jadwal-tugas':
        requireAuth();
        (new JadwalTugasController($koneksi))->delete();
        break;
    case 'upload-tugas':
    requireAuth();
    (new UploadTugasController($koneksi))->index();
    break;

case 'upload-tugas-create':
    requireAuth();
    (new UploadTugasController($koneksi))->create();
    break;
    case 'profile':
        requireAuth();
        (new ProfileController($koneksi))->index();
        break;
    case 'edit-profile':
        requireAuth();
        (new ProfileController($koneksi))->edit();
        break;
    case 'chat':
        requireAuth();
        (new ChatController($koneksi))->index();
        break;
    case 'chat-private':
        requireAuth();
        (new ChatPrivateController($koneksi))->index(); 
        break;
    case 'chatPrivate-conversation':
    requireAuth();
    (new ChatPrivateController($koneksi))->conversation();
    break;
case 'chatPrivate-send':
    requireAuth();
    (new ChatPrivateController($koneksi))->send();
    break;
    case 'delete-account':
        requireAuth();
        (new ProfileController($koneksi))->delete();
        break;
    default:
        http_response_code(404);
        echo "Halaman tidak ditemukan.";
        break;
}
