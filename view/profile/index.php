<!-- view/profile/index.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 700px;">
    <h2 class="mb-4">Profil Saya</h2>
    <div class="card">
        <div class="card-header bg-primary text-white">Profil Mahasiswa</div>
        <div class="card-body">
            <?php if (!empty($_SESSION['user'])): ?>
                <table class="table table-borderless">
                    <tr>
                        <th>Nama</th>
                        <td><?= htmlspecialchars($_SESSION['user']['nama']) ?></td>
                    </tr>
                    <tr>
                        <th>NIM</th>
                        <td><?= htmlspecialchars($_SESSION['user']['nim']) ?></td>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <td><?= htmlspecialchars($_SESSION['user']['prodi']) ?></td>
                    </tr>
                    <tr>
                        <th>Angkatan</th>
                        <td><?= htmlspecialchars($_SESSION['user']['angkatan']) ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= htmlspecialchars($_SESSION['user']['email']) ?></td>
                    </tr>
                </table>
                <a href="index.php?page=edit-profile" class="btn btn-warning">✏️ Edit Profil</a>
                <a href="index.php?page=dashboard" class="btn btn-secondary">🏠 Kembali</a>
            <?php else: ?>
                <div class="alert alert-danger">Data pengguna tidak ditemukan. Silakan login kembali.</div>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
