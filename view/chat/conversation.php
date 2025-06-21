<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Chat dengan <?= htmlspecialchars($receiver['nama']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .chat-bubble {
            padding: 10px;
            border-radius: 15px;
            margin-bottom: 10px;
            max-width: 70%;
        }
        .me {
            background-color: #d1e7dd;
            align-self: flex-end;
        }
        .them {
            background-color: #f8d7da;
            align-self: flex-start;
        }
    </style>
</head>
<body class="bg-light">
<div class="container mt-4" style="max-width: 800px;">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Chat dengan <?= htmlspecialchars($receiver['nama']) ?>
        </div>
        <div class="card-body d-flex flex-column" style="gap: 10px; min-height: 400px;">
            <?php if (!empty($messages)): ?>
                <?php foreach ($messages as $msg): ?>
                    <div class="d-flex <?= $msg['sender_id'] == $_SESSION['user']['id'] ? 'justify-content-end' : 'justify-content-start' ?>">
                        <div class="chat-bubble <?= $msg['sender_id'] == $_SESSION['user']['id'] ? 'me' : 'them' ?>">
                            <?= htmlspecialchars($msg['message']) ?><br>
                            <small class="text-muted"><?= $msg['created_at'] ?></small>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted">Belum ada pesan.</p>
            <?php endif; ?>
        </div>
        <div class="card-footer">
            <form method="POST" action="index.php?page=chatPrivate-send">
                <div class="input-group">
                    <input type="hidden" name="receiver_id" value="<?= htmlspecialchars($receiver['id']) ?>">
                    <input type="text" name="message" class="form-control" placeholder="Ketik pesan..." required>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
            <a href="index.php?page=chatPrivate" class="btn btn-link mt-2">⬅️ Kembali ke daftar pengguna</a>
        </div>
    </div>
</div>
</body>
</html>
