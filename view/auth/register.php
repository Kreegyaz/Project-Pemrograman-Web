<!-- view/auth/register.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 600px;">
    <div class="card">
        <div class="card-header bg-success text-white">Form Registrasi Mahasiswa</div>
        <div class="card-body">
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            <?php if (!empty($success)): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3"><label>Nama</label><input type="text" name="nama" class="form-control" required></div>
                <div class="mb-3"><label>NIM</label><input type="text" name="nim" class="form-control" required></div>
                <div class="mb-3"><label>Program Studi</label><input type="text" name="prodi" class="form-control" required></div>
                <div class="mb-3"><label>Angkatan</label><input type="number" name="angkatan" class="form-control" required></div>
                <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
                <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div>
                <div class="mb-3"><label>Konfirmasi Password</label><input type="password" name="confirm_password" class="form-control" required></div>
                <button type="submit" class="btn btn-success">Daftar</button>
                <a href="index.php?page=login" class="btn btn-link">Sudah punya akun?</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
