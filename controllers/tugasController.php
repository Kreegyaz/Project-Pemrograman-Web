<?php

class TugasController {
    function index() {
        include './views/tugas/index.php';
    }
    function upload() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Proses upload tugas
            echo "<script>alert('Tugas diupload');</script>";
        }
        include './views/tugas/upload.php';
    }
}
