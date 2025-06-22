<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Saya</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
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

    <main class="flex-grow w-full max-w-2xl mx-auto pt-24 pb-12 px-4">
        <?php if (!empty($_SESSION['user'])): ?>
            <div class="flex flex-col bg-gradient-blue h-full rounded-2xl shadow-lg">
                
                <div class="text-white flex flex-col items-center mt-8 mb-6 px-4">
                    <img src="assets/img/foto-profile.png" alt="Profile" class="w-20 h-20 rounded-full border-4 border-white object-cover" />
                    <h2 class="mt-2 font-semibold text-lg"><?= htmlspecialchars($_SESSION['user']['nama']) ?></h2>
                    <p class="text-sm text-gray-300"><?= htmlspecialchars($_SESSION['user']['email']) ?></p>
                    <a href="index.php?page=edit-profile" class="bg-white text-blue font-semibold px-5 py-2 mt-4 rounded-full text-sm hover:opacity-90 transition-opacity">Edit Profil</a>
                </div>

                <div class="rounded-b-2xl p-4 sm:p-6">
                    <div class="bg-[#F3F7F6] p-6 rounded-2xl space-y-4">
                        <h3 class="font-bold text-xl text-blue">GENERAL</h3>
                        <div>
                            <p class="text-xs text-gray-600">Nama</p>
                            <p class="font-bold text-gray-800"><?= htmlspecialchars($_SESSION['user']['nama']) ?></p>
                            <hr class="border-t-1 border-gray-300 mt-2" />
                        </div>
                        <div>
                            <p class="text-xs text-gray-600">NIM</p>
                            <p class="font-bold text-gray-800"><?= htmlspecialchars($_SESSION['user']['nim']) ?></p>
                            <hr class="border-t-1 border-gray-300 mt-2" />
                        </div>
                        <div>
                            <p class="text-xs text-gray-600">Program Studi</p>
                            <p class="font-bold text-gray-800"><?= htmlspecialchars($_SESSION['user']['prodi']) ?></p>
                            <hr class="border-t-1 border-gray-300 mt-2" />
                        </div>
                        <div>
                            <p class="text-xs text-gray-600">Angkatan</p>
                            <p class="font-bold text-gray-800"><?= htmlspecialchars($_SESSION['user']['angkatan']) ?></p>
                            <hr class="border-t-1 border-gray-300 mt-2" />
                        </div>
                    </div>
                </div>

                <div class="px-6 pb-8 pt-4 flex justify-center">
                     <a href="index.php?page=logout" class="bg-red-500 text-white font-bold py-2 px-8 rounded-full hover:bg-red-600 transition-colors">Logout</a>
                </div>

            </div>
        <?php else: ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg text-center">Data pengguna tidak ditemukan. Silakan login kembali.</div>
        <?php endif; ?>
    </main>
</body>
</html>