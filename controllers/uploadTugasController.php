<?php
require_once __DIR__ . '/../models/uploadTugas.php';
require_once __DIR__ . '/../models/jadwalTugas.php';

class UploadTugasController {
    private $db;
    

    public function __construct($koneksi) {
        $this->db = $koneksi;
    }

    public function index() {
        $model = new JadwalTugas($this->db);
        $daftar_tugas = $model->getAll();
        $uploadModel = new UploadTugas($this->db);
        $riwayat_upload = $uploadModel->getAllByUserId($_SESSION['user']['id']);


        include __DIR__ . '/../view/uploadTugas/index.php';
    }

    public function create() {
        $error = '';
        $jadwalModel = new JadwalTugas($this->db);
        $jadwalList = $jadwalModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user']['id'];
            $jadwal_id = $_POST['jadwal_tugas_id'];
            $text_submission = $_POST['text_submission'] ?? null;
            $file_path = '';

            if (!empty($_FILES['file_upload']['name'])) {
                $filename = time() . '_' . basename($_FILES['file_upload']['name']);
                $destination = __DIR__ . '/../uploads/' . $filename;
                if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $destination)) {
                    $file_path = 'uploads/' . $filename;
                } else {
                    $error = 'Gagal upload file.';
                }
            }

            if (empty($error)) {
                $model = new UploadTugas($this->db);
                $model->create([
                    'user_id' => $user_id,
                    'jadwal_tugas_id' => $jadwal_id,
                    'file_path' => $file_path,
                    'text_submission' => $text_submission
                ]);
                header("Location: index.php?page=upload-tugas");
                exit;
            }
        }

        include __DIR__ . '/../view/uploadTugas/create.php';
    }
}
