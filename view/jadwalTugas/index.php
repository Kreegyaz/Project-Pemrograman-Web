<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jadwal Tugas</title>
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
        <div class="container mx-auto max-w-5xl">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Daftar Jadwal Tugas</h2>
                <a href="index.php?page=buat-jadwal-tugas" class="bg-gradient-blue hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-full inline-flex items-center transition-all duration-200 hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Tugas
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <?php if (empty($jadwal)): ?>
                    <div class="p-10 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p class="mt-2 text-gray-500">Belum ada jadwal tugas yang tersedia</p>
                    </div>
                <?php else: ?>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gradient-blue text-white">
                                <tr>
                                    <th class="py-3 px-6 font-medium">Nama Tugas</th>
                                    <th class="py-3 px-6 font-medium">Deskripsi</th>
                                    <th class="py-3 px-6 font-medium">Modul</th>
                                    <th class="py-3 px-6 font-medium">Deadline</th>
                                    <th class="py-3 px-6 font-medium">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php foreach ($jadwal as $row): ?>
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="py-4 px-6 font-medium text-gray-900">
                                            <?= htmlspecialchars($row['nama_tugas']) ?>
                                        </td>
                                        <td class="py-4 px-6 text-gray-500 max-w-xs truncate">
                                            <?= htmlspecialchars($row['deskripsi_tugas']) ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php if (!empty($row['modul'])): ?>
                                                <a href="<?= htmlspecialchars($row['modul']) ?>" target="_blank" class="text-blue-600 hover:text-blue-800 inline-flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                                                    </svg>
                                                    Lihat Modul
                                                </a>
                                            <?php else: ?>
                                                <span class="text-gray-400">Tidak ada modul</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php 
                                            $deadline = strtotime($row['deadline']);
                                            $now = time();
                                            $badgeClass = ($deadline < $now) ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800';
                                            ?>
                                            <span class="<?= $badgeClass ?> text-xs font-medium px-2.5 py-1 rounded-full">
                                                <?= date('d M Y H:i', $deadline) ?>
                                            </span>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="flex space-x-2">
                                                <a href="index.php?page=edit-jadwal-tugas&id=<?= $row['id'] ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                    </svg>
                                                </a>
                                                <a href="index.php?page=hapus-jadwal-tugas&id=<?= $row['id'] ?>" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md transition-colors" onclick="return confirm('Yakin ingin menghapus tugas ini?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mt-6">
                <a href="index.php?page=dashboard" class="inline-flex items-center text-gray-700 hover:text-blue-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Kembali ke Dashboard
                </a>
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
        /* Truncate text untuk deskripsi */
        .truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</body>
</html>
