<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Jadwal Tugas</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
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

    <main class="flex-grow overflow-y-auto mt-24 px-4 md:px-6 lg:px-8">
        <div class="container mx-auto max-w-2xl">
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-gradient-blue py-4 px-6">
                    <h2 class="text-xl font-bold text-white flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Jadwal Tugas
                    </h2>
                </div>
                
                <div class="p-6">
                    <form method="POST" enctype="multipart/form-data" class="space-y-6">
                        <div>
                            <label for="nama_tugas" class="block text-sm font-medium text-gray-700 mb-1">Nama Tugas</label>
                            <input 
                                type="text" 
                                id="nama_tugas" 
                                name="nama_tugas" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                                value="<?= htmlspecialchars($jadwal['nama_tugas']) ?>" 
                                required
                            >
                        </div>
                        
                        <div>
                            <label for="deskripsi_tugas" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Tugas</label>
                            <textarea 
                                id="deskripsi_tugas" 
                                name="deskripsi_tugas" 
                                rows="4" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                                required
                            ><?= htmlspecialchars($jadwal['deskripsi_tugas']) ?></textarea>
                        </div>
                        
                        <div>
                            <label for="deadline" class="block text-sm font-medium text-gray-700 mb-1">Deadline</label>
                            <input 
                                type="datetime-local" 
                                id="deadline" 
                                name="deadline" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                                value="<?= date('Y-m-d\TH:i', strtotime($jadwal['deadline'])) ?>" 
                                required
                            >
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Modul Sebelumnya</label>
                            <?php if (!empty($jadwal['modul'])): ?>
                                <a href="<?= htmlspecialchars($jadwal['modul']) ?>" target="_blank" class="text-blue-600 hover:text-blue-800 inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                                    </svg>
                                    Lihat Modul
                                </a>
                            <?php else: ?>
                                <span class="text-gray-400">Tidak ada modul</span>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <label for="modul" class="block text-sm font-medium text-gray-700 mb-1">Ganti Modul (opsional)</label>
                            <input 
                                type="file" 
                                id="modul" 
                                name="modul" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            >
                            <p class="mt-1 text-sm text-gray-500">Format yang didukung: PDF, DOCX, ZIP (Maksimal 10MB)</p>
                        </div>
                        
                        <div class="flex justify-end space-x-3 pt-4">
                            <a href="index.php?page=jadwal-tugas" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-full transition-colors">
                                Kembali
                            </a>
                            <button type="submit" class="px-4 py-2 bg-gradient-blue hover:opacity-90 text-white rounded-full transition-opacity flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <style>
        /* Tambahan style untuk background gradient */
        .bg-gradient-blue {
            background: linear-gradient(90deg, #2C5282 0%, #1E3A8A 100%);
        }
        .text-gradient-blue {
            background: linear-gradient(90deg, #2C5282 0%, #1E3A8A 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</body>
</html>
