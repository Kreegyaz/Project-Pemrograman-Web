<!-- view/dashboard.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Halo, <?= htmlspecialchars($_SESSION['user']['nama']) ?> 👋</h2>
        
        <div class="row g-3">
            <a href="index.php?page=jadwal-tugas" class="btn btn-primary">📅 Jadwal Tugas</a>

            <div class="col-6 col-md-3">
                <a href="index.php?page=chat" class="btn btn-info w-100">💬 Chat</a>
            </div>
            <div class="col-6 col-md-3">
                <a href="index.php?page=profile" class="btn btn-success w-100">🙍‍♂️ Profil</a>
            </div>
             <div class="col-6 col-md-3">
            <a href="index.php?page=upload-tugas" class="btn btn-success w-100">📤 Upload Tugas</a>
        </div>
        </div>
    </div>
</body>
</html>
