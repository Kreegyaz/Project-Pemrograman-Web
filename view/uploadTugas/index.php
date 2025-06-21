<html>
<head>
    <title>Daftar Upload Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3>Daftar Upload Tugas</h3>
    <a href="index.php?page=upload-tugas-create" class="btn btn-primary mb-3">+ Upload Tugas</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nama Tugas</th>
                <th>File</th>
                <th>Text</th>
                <th>Waktu Upload</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($uploads as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['nama_tugas']) ?></td>
                    <td>
                        <?php if (!empty($row['file_path'])): ?>
                            <a href="<?= $row['file_path'] ?>" target="_blank">📄 Lihat File</a>
                        <?php else: ?>-
                        <?php endif; ?>
                    </td>
                    <td><?= nl2br(htmlspecialchars($row['text_submission'])) ?></td>
                    <td><?= $row['uploaded_at'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?page=dashboard" class="btn btn-secondary">Kembali</a>
</div>
</body>
</html>
