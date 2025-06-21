<!-- 
<!DOCTYPE html>
<html>
<head>
    <title>Upload Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3>Upload Tugas</h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="jadwal_tugas_id" class="form-label">Pilih Jadwal Tugas</label>
            <select name="jadwal_tugas_id" id="jadwal_tugas_id" class="form-select" required>
                <option value="">-- Pilih --</option>
                <?php foreach ($jadwalList as $jadwal): ?>
                    <option value="<?= $jadwal['id'] ?>"><?= htmlspecialchars($jadwal['nama_tugas']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Upload File</label>
            <input type="file" name="file_upload" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Atau Tulis Jawaban</label>
            <textarea name="text_submission" rows="5" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Kirim</button>
        <a href="index.php?page=dashboard" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html> -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload Tugas</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>
<body class="bg-gray-50 p-6 flex flex-col min-h-screen">
    <header
      class="fixed top-0 left-0 flex justify-between mb-5 items-center w-full p-5 bg-white"
    >
      <div class="flex items-center">
        <img
          class="w-10 h-10"
          src="assets/svg/praktikom2-icon.svg"
          alt=""
        />
        <h1 class="text-blue semibold-heading">PRAKTIKOM</h1>
      </div>
      <div class="flex w-full justify-evenly text-white">
        <a href="index.php?page=dashboard"
          ><h1 class="bg-blue px-6 py-2 rounded-full">Home</h1></a
        >
        <a href="index.php?page=upload-tugas"
          ><h1 class="bg-blue px-6 py-2 rounded-full">Dashboard</h1></a
        >
        <a href="index.php?page=chat-private"
          ><h1 class="bg-blue px-6 py-2 rounded-full">Chat</h1></a
        >
      </div>
      <a href="index.php?page=profile">
        <img
          src="assets/svg/profile-icon.svg"
          alt=""
          class="w-8 h-8 m-1 p-1 bg-blue rounded-full"
        />
      </a>
    </header>

    <main class="flex-grow overflow-y-auto mt-20">
        <div class="container mx-auto max-w-2xl px-4">
            <div class="bg-white p-8 rounded-lg shadow-md border border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Upload Tugas</h2>
                
                <form method="POST" enctype="multipart/form-data" class="space-y-6">
                    
                    <div>
                        <label for="jadwal_tugas_id" class="block mb-2 text-sm font-medium text-gray-700">Pilih Jadwal Tugas</label>
                        <select name="jadwal_tugas_id" id="jadwal_tugas_id" class="w-full p-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">-- Pilih Tugas --</option>
                            <?php 
                                // Ambil ID dari URL jika ada
                                $selected_id = $_GET['jadwal_id'] ?? '';
                                foreach ($jadwalList as $jadwal): 
                                    // Set 'selected' jika ID cocok
                                    $selected = ($jadwal['id'] == $selected_id) ? 'selected' : '';
                            ?>
                                <option value="<?= $jadwal['id'] ?>" <?= $selected ?>>
                                    <?= htmlspecialchars($jadwal['nama_tugas']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label for="file_upload" class="block mb-2 text-sm font-medium text-gray-700">Upload File (Opsional)</label>
                        <input type="file" name="file_upload" id="file_upload" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:bg-gray-200 file:text-gray-700 file:border-0 file:px-4 file:py-3 file:mr-4">
                        <p class="mt-1 text-xs text-gray-500">Tipe file: PDF, DOCX, ZIP, dll. Maks 10MB.</p>
                    </div>

                    <div>
                        <label for="text_submission" class="block mb-2 text-sm font-medium text-gray-700">Atau Tulis Jawaban Langsung</label>
                        <textarea name="text_submission" id="text_submission" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Ketikkan jawaban atau link tugas Anda di sini..."></textarea>
                    </div>
                    
                    <div class="flex items-center gap-4 pt-4">
                        <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-3 text-center">
                            Kirim Jawaban
                        </button>
                        <a href="index.php?page=daftar-tugas" class="text-gray-600 bg-gray-100 hover:bg-gray-200 font-medium rounded-lg text-sm px-6 py-3 text-center border border-gray-300">
                            Kembali
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </main>
</body>
</html>