<?php
class JadwalController {
    function index() {
        include './views/jadwal/index.php';
    }
    function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Simpan ke DB
            echo "<script>alert('Jadwal disimpan');</script>";
        }
        include './views/jadwal/add.php';
    }
}