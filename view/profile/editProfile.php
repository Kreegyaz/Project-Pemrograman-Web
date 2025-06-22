<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profil</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="style.css" />
</head>
<body class=" flex flex-col min-h-screen">
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
        <div class="flex flex-col bg-gradient-blue h-full rounded-2xl px-4 sm:px-8 md:px-20 shadow-lg">
            <div class="text-white flex flex-col items-center mt-8 mb-6">
                <img src="assets/img/foto-profile.png" alt="Profile" class="w-20 h-20 rounded-full border-4 border-white object-cover" />
                <h2 class="mt-2 font-semibold text-lg"><?= htmlspecialchars($user['nama']) ?></h2>
                <p class="text-sm text-gray-300"><?= htmlspecialchars($user['email']) ?></p>
            </div>

            <div class=" rounded-b-2xl p-4 sm:p-6 h-full">
                <form method="POST" class="bg-[#F3F7F6] p-6 rounded-2xl space-y-4">
                    <h3 class="font-bold text-xl text-blue">EDIT GENERAL INFO</h3>

                    <?php if (!empty($error)): ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
                            <span class="block sm:inline"><?= $error ?></span>
                        </div>
                    <?php endif; ?>

                    <div>
                        <label for="nama" class="text-xs text-gray-600">Nama</label>
                        <input type="text" id="nama" name="nama" class="w-full bg-transparent border-b-2 border-gray-300 focus:border-blue focus:outline-none font-bold text-gray-800" value="<?= htmlspecialchars($user['nama']) ?>" required>
                    </div>

                    <div>
                        <label for="email" class="text-xs text-gray-600">Email</label>
                        <input type="email" id="email" name="email" class="w-full bg-transparent border-b-2 border-gray-300 focus:border-blue focus:outline-none font-bold text-gray-800" value="<?= htmlspecialchars($user['email']) ?>" required>
                    </div>

                    <div>
                        <label for="prodi" class="text-xs text-gray-600">Program Studi</label>
                        <input type="text" id="prodi" name="prodi" class="w-full bg-transparent border-b-2 border-gray-300 focus:border-blue focus:outline-none font-bold text-gray-800" value="<?= htmlspecialchars($user['prodi']) ?>" required>
                    </div>

                    <div>
                        <label for="angkatan" class="text-xs text-gray-600">Angkatan</label>
                        <input type="number" id="angkatan" name="angkatan" class="w-full bg-transparent border-b-2 border-gray-300 focus:border-blue focus:outline-none font-bold text-gray-800" value="<?= htmlspecialchars($user['angkatan']) ?>" required>
                    </div>

                    <div class="pt-6 flex flex-col sm:flex-row gap-4">
                        <button type="submit" class="w-full sm:w-auto flex-grow bg-blue text-white font-bold py-2 px-6 rounded-full hover:opacity-90 transition-opacity">
                            Simpan Perubahan
                        </button>
                        <a href="index.php?page=profile" class="w-full sm:w-auto text-center bg-gray-200 text-gray-800 font-bold py-2 px-6 rounded-full hover:bg-gray-300 transition-colors">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>