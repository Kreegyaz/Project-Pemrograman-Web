<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Chat Privat</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="p-6 w-screen relative">
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
    
    <main>
      <div class="flex items-center gap-2 bg-grey rounded-lg p-2 mt-20 mb-4">
        <img
          src="assets/svg/search-icon.svg"
          alt="Search Icon"
          class="w-5 h-5"
        />
        <!-- Input field -->
        <input
          placeholder="Cari pesan"
          type="text"
          class="bg-transparent border-none outline-none p-1 text-black"
        />
      </div>

      <div class="chat-conteiner w-full flex flex-col gap-5">
            <?php foreach ($users as $user): ?>
                <a href="index.php?page=chatPrivate-conversation&user_id=<?= $user['id'] ?>">
                <div class="flex flex-col gap-2">
                    <div class="flex gap-3 items-center">
                    <h1 class="bg-orange-pastel w-12 h-12 text-white rounded-2xl flex justify-center items-center">
                        <?= strtoupper(substr($user['nama'], 0, 1)) ?>
                    </h1>
                    <div class="flex flex-col w-full">
                        <div class="flex gap-2 items-center justify-between">
                        <h1 class="text-blue medium-heading font-bold">
                            <?= htmlspecialchars($user['nama']) ?>
                        </h1>
                        <div class="flex gap-2 items-center">
                            <div class="w-1 h-1 bg-blue rounded-full"></div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </a>
            <?php endforeach; ?>
        </div>
    </main>
    
</body>
</html>
