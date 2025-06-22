<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Penugasan</title>
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
        <div class="container mx-auto">
            <div class="mb-5 border-b border-gray-200 pb-1">
                <div class="">
                    <button onclick="changeTab('tugas')" id="tab-button-tugas" class="tab-button active cursor-pointer flex-1 py-2 px-4 text-sm font-medium text-white bg-gray-700 rounded-md focus:outline-none">
                        Daftar Tugas
                    </button>
                    <button onclick="changeTab('riwayat')" id="tab-button-riwayat" class="tab-button cursor-pointer flex-1 py-2 px-4 text-sm font-medium text-white bg-gray-700 rounded-md focus:outline-none">
                        Riwayat Upload
                    </button>
                </div>
            </div>

            <div id="tab-content-tugas" class="tab-content active">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    <?php if (!empty($daftar_tugas)): ?>
                        <?php foreach ($daftar_tugas as $tugas): ?>
                            <a href="index.php?page=upload-tugas-create&jadwal_id=<?= $tugas['id'] ?>" class="block">
                                <div class="flex flex-col justify-between p-5 h-full bg-white border border-gray-200 rounded-xl shadow-sm cursor-pointer hover:shadow-lg hover:border-blue-500 transition-all">
                                    <div>
                                        <h3 class="text-md font-semibold text-gray-900"><?= htmlspecialchars($tugas['nama_tugas']) ?></h3>
                                        <p class="text-xs text-gray-500 mt-1"><?= htmlspecialchars($tugas['nama_matakuliah'] ?? 'Mata Kuliah Umum') ?></p>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-xs font-medium text-red-600">Tenggat: <?= date('d M Y, H:i', strtotime($tugas['deadline'])) ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-span-full text-center py-10">
                            <p class="text-gray-500">Tidak ada tugas yang tersedia saat ini.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div id="tab-content-riwayat" class="tab-content">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-600">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Nama Mahasiswa</th>
                                    <th scope="col" class="px-6 py-3">Nama Tugas</th>
                                    <th scope="col" class="px-6 py-3">Submission</th>
                                    <th scope="col" class="px-6 py-3">Waktu Upload</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($riwayat_upload)): ?>
                                    <?php foreach ($riwayat_upload as $upload): ?>
                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <td class="px-6 py-4 font-medium text-gray-900"><?= htmlspecialchars($upload['nama']) ?></td>
                                            <td class="px-6 py-4"><?= htmlspecialchars($upload['nama_tugas']) ?></td>
                                            <td class="px-6 py-4">
                                                <?php if (!empty($upload['file_path'])): ?>
                                                    <a href="<?= $upload['file_path'] ?>" target="_blank" class="font-medium text-blue-600 hover:underline">📄 Lihat File</a>
                                                <?php else: ?>
                                                    <span class="text-gray-400"><?= $upload['text_submission'] ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="px-6 py-4"><?= date('d M Y, H:i', strtotime($upload['uploaded_at'])) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-10 text-gray-500">Belum ada tugas yang diupload.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script>
        function changeTab(tabName) {
             
            // Sembunyikan semua konten tab dengan menghapus kelas .active
            document.querySelectorAll('.tab-content').forEach(function(tabContent) {
                tabContent.classList.remove('active');
            });
            
            // Non-aktifkan semua tombol tab dengan menghapus kelas .active
            document.querySelectorAll('.tab-button').forEach(function(tabButton) {
                tabButton.classList.remove('active');
            });
            
            // Tampilkan konten tab yang dipilih dengan MENAMBAHKAN kelas .active
            document.getElementById('tab-content-' + tabName).classList.add('active');
            
            // Aktifkan tombol tab yang dipilih dengan menambahkan kelas .active
            document.getElementById('tab-button-' + tabName).classList.add('active');
        }
    </script>
</body>
</html>