<!DOCTYPE html>
<html>
<head>
    <title>Buat Jadwal Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3>Buat Jadwal Tugas</h3>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nama Tugas</label>
            <input type="text" name="nama_tugas" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi Tugas</label>
            <textarea name="deskripsi_tugas" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Upload Modul (PDF/DOC)</label>
            <input type="file" name="modul" class="form-control">
        </div>
        <div class="mb-3">
            <label>Deadline</label>
            <input type="date" name="deadline" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php?page=dashboard" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
