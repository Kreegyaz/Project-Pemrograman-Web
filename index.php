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
require_once __DIR__ . '/controllers/JadwalController.php';
require_once __DIR__ . '/controllers/TugasController.php';
require_once __DIR__ . '/controllers/ProfileController.php';
require_once __DIR__ . '/controllers/chatController.php';


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

// Router
switch ($page) {
    case 'login':
        (new AuthController($koneksi))->login();
        break;
    case 'register':
        (new AuthController($koneksi))->register();
        break;
    case 'logout':
        (new AuthController($koneksi))->logout();
        break;
    case 'dashboard':
        requireAuth();
        echo "<h2>Selamat datang, " . htmlspecialchars($_SESSION['user']['nama']) . "</h2>";
        echo '<br><a href="index.php?page=logout">Logout</a>';
        include __DIR__ . '/view/dashboard.php';
        break;
    case 'jadwal':
        requireAuth();
        (new JadwalController($koneksi))->index();
        break;
    case 'tugas':
        requireAuth();
        (new TugasController($koneksi))->index();
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

    default:
        http_response_code(404);
        echo "Halaman tidak ditemukan.";
        break;
}
