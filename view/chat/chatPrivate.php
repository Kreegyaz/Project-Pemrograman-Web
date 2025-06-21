<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Chat Privat</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="p-6 w-screen relative">
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
