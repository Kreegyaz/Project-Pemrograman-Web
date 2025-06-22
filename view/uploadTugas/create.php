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
    <header class="fixed top-0 left-0 w-full z-20 bg-white shadow-md px-6 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <img src="assets/svg/praktikom2-icon.svg" alt="Logo Praktikom" class="w-10 h-10" />
            <h1 class="text-2xl font-bold text-gradient-blue tracking-wide">PRAKTIKOM</h1>
        </div>
        <nav class="hidden md:flex space-x-30">
            <a href="index.php?page=dashboard" class="bg-gradient-blue hover:scale-105 transition px-20 py-2 rounded-full text-white font-medium">Home</a>
            <a href="index.php?page=upload-tugas" class="bg-gradient-blue hover:scale-105 transition px-20 py-2 rounded-full text-white font-medium">Dashboard</a>
            <a href="index.php?page=chat-private" class="bg-gradient-blue hover:scale-105 transition px-20 py-2 rounded-full text-white font-medium">Chat</a>
        </nav>
        <a href="index.php?page=profile" class="ml-4">
            <img src="assets/svg/profile-icon.svg" alt="Profil" class="w-9 h-9 p-1 bg-gradient-blue rounded-full hover:scale-105 transition" />
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
                        <a href="index.php?page=upload-tugas" class="text-gray-600 bg-gray-100 hover:bg-gray-200 font-medium rounded-lg text-sm px-6 py-3 text-center border border-gray-300">
                            Kembali
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </main>
</body>
</html>