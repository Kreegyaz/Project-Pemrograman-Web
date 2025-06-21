<!-- view/chatPrivate.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Chat Privat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3 class="mb-4">🔒 Chat Privat</h3>

    <?php if (empty($users)): ?>
        <div class="alert alert-info">Tidak ada user lain untuk diajak chat.</div>
    <?php else: ?>
        <div class="row">
            <?php foreach ($users as $user): ?>
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($user['nama']) ?></h5>
                            <p class="card-text"><strong>NIM:</strong> <?= htmlspecialchars($user['nim']) ?></p>
                            <a href="index.php?page=chatPrivate-conversation&user_id=<?= $user['id'] ?>" class="btn btn-outline-primary">Chat</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <a href="index.php?page=dashboard" class="btn btn-secondary mt-4">⬅ Kembali ke Dashboard</a>
</div>
</body>
</html>
