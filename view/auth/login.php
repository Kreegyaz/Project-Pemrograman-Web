<!-- view/auth/login.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 500px;">
    <div class="card">
        <div class="card-header bg-primary text-white">Login Mahasiswa</div>
        <div class="card-body">
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST" action="index.php?page=login">
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password">Kata Sandi</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Masuk</button>
                <div class="mt-3 text-center">
                    <a href="index.php?page=register">Belum punya akun? Daftar di sini</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
