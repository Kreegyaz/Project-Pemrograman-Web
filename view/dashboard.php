<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="bg-gray-100">
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


    <main class="pt-24">
        <div class="w-full h-full px-4 md:px-6 lg:px-8">
            <div class="swiper rounded-xl overflow-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="assets/img/carousel1-img.png" alt="Banner 1" class="w-full h-[60vh] object-cover" /></div>
                    <div class="swiper-slide"><img src="assets/img/carousel2-img.jpg" alt="Banner 2" class="w-full h-[60vh] object-cover" /></div>
                    <div class="swiper-slide"><img src="assets/img/carousel3-img.png" alt="Banner 3" class="w-full h-[60vh] object-cover" /></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <div class="container mx-auto px-4 md:px-6 lg:px-8 mt-8">
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-800">Selamat Datang Kembali, <span class="text-blue"><?= htmlspecialchars($_SESSION['user']['nama']) ?>!</span></h2>
                <p class="text-gray-500 mt-1">Siap untuk melanjutkan pembelajaran hari ini?</p>
            </section>

            <section class="mb-12">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                    <a href="index.php?page=jadwal-tugas" class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl hover:-translate-y-1 transition-all flex flex-col items-center text-center">
                        <div class="bg-red-700 rounded-full p-4 mb-3"><img src="assets/svg/classes-icon.svg" class="w-8 h-8" alt="Jadwal Tugas"/></div>
                        <h3 class="font-semibold text-gray-800">Jadwal Tugas</h3>
                        <p class="text-xs text-gray-500 mt-1">Lihat semua dan Upload tugas.</p>
                    </a>
                    <a href="index.php?page=upload-tugas" class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl hover:-translate-y-1 transition-all flex flex-col items-center text-center">
                        <div class="bg-orange rounded-full p-4 mb-3"><img src="assets/svg/classwork-icon.svg" class="w-8 h-8" alt="Jadwal Tugas"/></div>
                        <h3 class="font-semibold text-gray-800">Tambah Tugas</h3>
                        <p class="text-xs text-gray-500 mt-1">Pemberian Penugasan dan Materi.</p>
                    </a>
                    <a href="index.php?page=chat-private" class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl hover:-translate-y-1 transition-all flex flex-col items-center text-center">
                        <div class="bg-green-700 rounded-full p-4 mb-3"><img src="assets/svg/chat-icon.svg" class="w-8 h-8" alt="Chat"/></div>
                        <h3 class="font-semibold text-gray-800">Diskusi & Chat</h3>
                        <p class="text-xs text-gray-500 mt-1">Mengobrol dengan dosen & teman.</p>
                    </a>
                    
                    <a href="index.php?page=profile" class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl hover:-translate-y-1 transition-all flex flex-col items-center text-center">
                        <div class="bg-blue rounded-full p-4 mb-3"><img src="assets/svg/profile-icon.svg" class="w-8 h-8" alt="Profil"/></div>
                        <h3 class="font-semibold text-gray-800">Profil Saya</h3>
                        <p class="text-xs text-gray-500 mt-1">Atur informasi akun Anda.</p>
                    </a>
                </div>
            </section>

            <section class="mb-12">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Tugas Mendatang</h3>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="space-y-4">
                        <?php if (!empty($tugas_mendatang)): ?>
                            <?php foreach ($tugas_mendatang as $tugas): ?>
                                <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50">
                                    <div>
                                        <p class="font-semibold text-gray-800"><?= htmlspecialchars($tugas['nama_tugas']) ?></p>
                                        <p class="text-sm text-gray-500"><?= htmlspecialchars($tugas['nama_matakuliah'] ?? 'Tugas Umum') ?></p>
                                    </div>
                                    <div class="text-right">
                                        <span class="font-bold text-red-500"><?= date('d M', strtotime($tugas['deadline'])) ?></span>
                                        <p class="text-xs text-gray-400"><?= date('H:i', strtotime($tugas['deadline'])) ?> WIB</p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-gray-500 text-center py-4">🎉 Tidak ada tugas yang akan datang. Santai sejenak!</p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        
        </div>
    </main>
    
    <footer class="bg-white mt-12 py-6">
        <div class="container mx-auto text-center text-gray-500 text-sm">
            <p>&copy; 2025 PRAKTIKOM. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Swiper(".swiper", {
                loop: true,
                pagination: { el: ".swiper-pagination", clickable: true },
                autoplay: { delay: 3500, disableOnInteraction: false },
            });
        });
    </script>
</body>
</html>