<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3>Daftar Jadwal Tugas</h3>
    <a href="index.php?page=buat-jadwal-tugas" class="btn btn-primary mb-3">+ Tambah Tugas</a>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Tugas</th>
            <th>Deskripsi</th>
            <th>Modul</th>
            <th>Deadline</th>
            <th>Aksi</th> <!-- Tambahan kolom -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jadwal as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['nama_tugas']) ?></td>
                <td><?= htmlspecialchars($row['deskripsi_tugas']) ?></td>
                <td>
                    <?php if (!empty($row['modul'])): ?>
                        <a href="<?= $row['modul'] ?>" target="_blank">📄 Lihat Modul</a>
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
                <td><?= $row['deadline'] ?></td>
                <td>
                    <a href="index.php?page=edit-jadwal-tugas&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">✏️ Edit</a>
                    <a href="index.php?page=hapus-jadwal-tugas&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus tugas ini?')">🗑️ Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    <a href="index.php?page=dashboard" class="btn btn-secondary">Kembali</a>
</div>
</body>
</html>
