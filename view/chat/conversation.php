<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chat dengan <?= htmlspecialchars($receiver['nama']) ?></title>
    
    <link rel="stylesheet" href="style.css" />
    
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="w-screen relative bg-light"> 
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

    <div class="pt-24 pb-40"> 
        <div class="flex flex-col gap-2 w-full p-6 justify-center items-center">
            <p class="inline-block text-center xsmall-text bg-blue w-auto px-4 py-1 text-white rounded-full">
                Chat dengan <?= htmlspecialchars($receiver['nama']) ?>
            </p>
        </div>

        <?php if (!empty($messages)): ?>
            <?php foreach ($messages as $msg): ?>
                <?php if ($msg['sender_id'] == $_SESSION['user']['id']): // Pesan dari SAYA ?>
                    <div class="bubble-chat mb-5 px-6">
                        <div class="flex flex-row-reverse justify-start gap-3 mb-2">
                            <div class="w-12"></div>
                            <div class="space-x-3 xsmall-text flex">
                                <p class="text-gray-500"><?= date('d M \a\t H:i', strtotime($msg['created_at'])) ?></p>
                            </div>
                        </div>
                        <div class="flex justify-end gap-3 items-start">
                            <div class="h-auto w-auto max-w-[70%] rounded-tl-xl rounded-tr-xl rounded-bl-xl bg-blue text-white p-3">
                                <p class="subtext">
                                    <?= htmlspecialchars($msg['message']) ?>
                                </p>
                            </div>
                            <img src="assets/svg/avatar-icon.svg" alt="My Profile" class="w-12 h-12 rounded-full" />
                        </div>
                    </div>
                <?php else: // Pesan dari ORANG LAIN ?>
                    <div class="bubble-chat mb-5 px-6">
                        <div class="flex gap-3 justify-start items-start mb-2">
                            <div class="w-12"></div>
                            <div class="space-x-3 xsmall-text flex">
                                <p class="font-semibold"><?= htmlspecialchars($receiver['nama']) ?></p>
                                <p class="text-gray-500"><?= date('d M \a\t H:i', strtotime($msg['created_at'])) ?></p>
                            </div>
                        </div>
                        <div class="flex gap-3 justify-start items-start">
                            <img src="../../assets/svg/avatar-icon.svg" alt="<?= htmlspecialchars($receiver['nama']) ?>'s Profile" class="w-12 h-12 rounded-full" />
                            <div class="h-auto w-auto max-w-[70%] rounded-tr-xl rounded-br-xl rounded-bl-xl bg-gray-200 p-3">
                                <p class="subtext text-black">
                                     <?= htmlspecialchars($msg['message']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center mt-10">
                <p class="text-gray-500">Belum ada pesan. Mulai percakapan yuk!</p>
            </div>
        <?php endif; ?>
    </div>

    <form class="fixed bottom-0 w-full border-t-2 border-gray-200 bg-white" method="POST" action="index.php?page=chatPrivate-send">
        <input type="hidden" name="receiver_id" value="<?= htmlspecialchars($receiver['id']) ?>">
        
        <div class="p-6 flex items-center justify-between gap-3">
            <label for="file-input" class="cursor-pointer">
                <input type="file" id="file-input" class="hidden" />
            </label>

            <div class="flex items-center gap-2 border-2 border-gray-300 rounded-full w-full py-2 px-4">
                <input 
                    placeholder="Ketik pesan..." 
                    type="text" 
                    class="form-control regular-text w-full border-none outline-none p-1 text-black bg-transparent"
                    name="message" 
                    required 
                    autocomplete="off"
                />
            </div>
            
            <button type="submit">
                <img src="assets/svg/submit-button.svg" alt="Send Icon" class="cursor-pointer w-10 h-10" />
            </button>
        </div>
    </form>
</body>
</html>
