<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4" style="max-width: 700px;">
    <h3>💬 Ruang Chat</h3>
    <div class="card mb-3">
        <div class="card-body" style="max-height: 300px; overflow-y: auto;">
            <?php while($row = $messages->fetch_assoc()): ?>
                <div><strong><?= htmlspecialchars($row['nama']) ?>:</strong> <?= htmlspecialchars($row['message']) ?></div>
                <small class="text-muted"><?= $row['created_at'] ?></small>
                <hr>
            <?php endwhile; ?>
        </div>
    </div>

    <form method="POST">
        <div class="mb-3">
            <textarea name="message" class="form-control" rows="3" placeholder="Tulis pesan..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
        <a href="index.php?page=dashboard" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
