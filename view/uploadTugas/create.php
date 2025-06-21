
<!DOCTYPE html>
<html>
<head>
    <title>Upload Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3>Upload Tugas</h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="jadwal_tugas_id" class="form-label">Pilih Jadwal Tugas</label>
            <select name="jadwal_tugas_id" id="jadwal_tugas_id" class="form-select" required>
                <option value="">-- Pilih --</option>
                <?php foreach ($jadwalList as $jadwal): ?>
                    <option value="<?= $jadwal['id'] ?>"><?= htmlspecialchars($jadwal['nama_tugas']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Upload File</label>
            <input type="file" name="file_upload" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Atau Tulis Jawaban</label>
            <textarea name="text_submission" rows="5" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Kirim</button>
        <a href="index.php?page=dashboard" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
