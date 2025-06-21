<!DOCTYPE html>
<html>
<head>
    <title>Edit Jadwal Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 700px;">
    <h3 class="mb-4">✏️ Edit Jadwal Tugas</h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama_tugas" class="form-label">Nama Tugas</label>
            <input type="text" class="form-control" id="nama_tugas" name="nama_tugas" value="<?= htmlspecialchars($jadwal['nama_tugas']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi_tugas" class="form-label">Deskripsi Tugas</label>
            <textarea class="form-control" id="deskripsi_tugas" name="deskripsi_tugas" rows="4" required><?= htmlspecialchars($jadwal['deskripsi_tugas']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input type="datetime-local" class="form-control" id="deadline" name="deadline" value="<?= date('Y-m-d\TH:i', strtotime($jadwal['deadline'])) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Modul Sebelumnya:</label><br>
            <?php if (!empty($jadwal['modul'])): ?>
                <a href="<?= $jadwal['modul'] ?>" target="_blank">📄 Lihat Modul</a>
            <?php else: ?>
                Tidak ada modul
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="modul" class="form-label">Ganti Modul (opsional)</label>
            <input type="file" class="form-control" id="modul" name="modul">
        </div>
        <button type="submit" class="btn btn-success">💾 Simpan Perubahan</button>
        <a href="index.php?page=jadwal-tugas" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
