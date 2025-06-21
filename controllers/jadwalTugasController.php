<?php
require_once __DIR__ . '/../models/jadwalTugas.php';


class JadwalTugasController {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function index() {
        $model = new JadwalTugas($this->koneksi);
        $jadwal = $model->getAll();
        include __DIR__ . '/../view/jadwalTugas/index.php';
    }

    public function create() {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama_tugas'];
            $deskripsi = $_POST['deskripsi_tugas'];
            $deadline = $_POST['deadline'];
            $modulPath = '';

            if (isset($_FILES['modul']) && $_FILES['modul']['error'] === UPLOAD_ERR_OK) {
                $namaFile = time() . '_' . basename($_FILES['modul']['name']);
                $tujuan = __DIR__ . '/../uploads/' . $namaFile;

                if (move_uploaded_file($_FILES['modul']['tmp_name'], $tujuan)) {
                    $modulPath = 'uploads/' . $namaFile;
                } else {
                    $error = 'Gagal upload file modul.';
                }
            }

            if (empty($error)) {
                $model = new JadwalTugas($this->koneksi);
                $model->create([
                    'nama_tugas' => $nama,
                    'deskripsi_tugas' => $deskripsi,
                    'modul' => $modulPath,
                    'deadline' => $deadline
                ]);
                header("Location: index.php?page=jadwal-tugas");
                exit;
            }
        }

        include __DIR__ . '/../view/jadwalTugas/create.php';
    }

    public function edit() {
    $id = $_GET['id'] ?? null;
    $model = new JadwalTugas($this->koneksi);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama_tugas'];
        $deskripsi = $_POST['deskripsi_tugas'];
        $deadline = $_POST['deadline'];
        $modulPath = $_POST['modul_lama'];

        // Jika ada file baru diupload
        if (isset($_FILES['modul']) && $_FILES['modul']['error'] === UPLOAD_ERR_OK) {
            $namaFile = time() . '_' . basename($_FILES['modul']['name']);
            $tujuan = __DIR__ . '/../uploads/' . $namaFile;

            if (move_uploaded_file($_FILES['modul']['tmp_name'], $tujuan)) {
                $modulPath = 'uploads/' . $namaFile;
            }
        }

        $model->update($id, [
            'nama_tugas' => $nama,
            'deskripsi_tugas' => $deskripsi,
            'modul' => $modulPath,
            'deadline' => $deadline
        ]);

        header("Location: index.php?page=jadwal-tugas");
        exit;
    }

    // Ambil data berdasarkan ID untuk tampilkan ke form
    $jadwal = $model->getById($id);
    include __DIR__ . '/../view/jadwalTugas/edit.php';
}

    public function delete() {
        $model = new JadwalTugas($this->koneksi);
        $id = $_GET['id'] ?? null;
        if ($id) {
            $model->delete($id);
        }
        header("Location: index.php?page=jadwal-tugas");
        exit;
    }
}
