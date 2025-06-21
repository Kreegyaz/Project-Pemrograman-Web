<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 600px;">
    <h2>Edit Profil</h2>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3"><label>Nama</label><input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($user['nama']) ?>" required></div>
        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required></div>
        <div class="mb-3"><label>Program Studi</label><input type="text" name="prodi" class="form-control" value="<?= htmlspecialchars($user['prodi']) ?>" required></div>
        <div class="mb-3"><label>Angkatan</label><input type="number" name="angkatan" class="form-control" value="<?= htmlspecialchars($user['angkatan']) ?>" required></div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="index.php?page=profile" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
