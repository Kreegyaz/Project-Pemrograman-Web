<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Kelas - Asprak</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../style.css" />
  <style>
    .progress-ring {
      transform: rotate(-90deg);
    }
  </style>
</head>
<body class="bg-grey text-blue font-[Inter]">

  <!-- Header -->
  <header class="bg-white shadow px-6 py-4 flex items-center justify-between">
    <div class="flex items-center gap-4">
      <button onclick="history.back()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
      </button>
      <h1 class="text-lg font-bold text-blue">Detail kelas</h1>
    </div>
    <button>
      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" class="w-5 h-5 text-blue">
        <path d="M3 9.5A1.5 1.5 0 1 1 3 6.5a1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm3.5-1.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0z"/>
      </svg>
    </button>
  </header>

  <!-- Main Content -->
  <main class="max-w-4xl mx-auto mt-8 px-4">
    <!-- Card Kelas -->
    <div class="bg-white shadow rounded-xl p-6 flex items-center justify-between">
      <div>
        <h2 class="font-bold text-blue">(C) Perancangan Pengalaman Pengguna</h2>
        <p class="text-sm text-dark-grey mt-1">Senin 07.00 - 08.40 • Gedung FILKOM FA.1.10</p>
      </div>
      <div class="relative w-16 h-16">
        <svg class="progress-ring absolute top-0 left-0 w-full h-full" viewBox="0 0 36 36">
          <path d="M18 2.0845
            a 15.9155 15.9155 0 0 1 0 31.831
            a 15.9155 15.9155 0 0 1 0 -31.831"
            fill="none" stroke="#eee" stroke-width="3.8" />
          <path d="M18 2.0845
            a 15.9155 15.9155 0 0 1 0 31.831"
            fill="none" stroke="#ff6823" stroke-width="3.8" stroke-dasharray="70, 100" />
        </svg>
        <span class="absolute inset-0 flex items-center justify-center text-sm font-bold text-orange">50%</span>
      </div>
    </div>

    <!-- Menu Aksi -->
    <div class="grid grid-cols-3 gap-4 mt-6 text-center">
      <button class="bg-[#F1F4F8] text-blue font-semibold py-3 rounded-xl">Penilaian</button>
      <button class="bg-[#F1F4F8] text-blue font-semibold py-3 rounded-xl">Presensi</button>
      <button class="bg-[#F1F4F8] text-blue font-semibold py-3 rounded-xl">Laporan</button>
    </div>

    <!-- Info Umum -->
    <section class="mt-10">
      <h3 class="font-bold text-blue mb-4 flex items-center gap-2 text-lg">
        <span class="text-2xl">▶</span> Informasi umum
      </h3>

      <!-- Pengumuman -->
      <div class="bg-white rounded-xl border border-[#D6D6D6] p-4 mb-4">
        <div class="flex gap-4 items-start">
          <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-10 h-10 rounded-full" alt="Dosen" />
          <div class="flex-1">
            <div class="flex justify-between items-center mb-1">
              <p class="font-semibold text-sm text-blue">Nanang Yudi Setiawan</p>
              <span class="text-xs text-dark-grey">19 Mei</span>
            </div>
            <p class="text-sm text-[#2E2E2E]">Perkuliahan hari ini dilaksanakan secara asinkron. Silakan mempelajari materi terbaru dan mengerjakan tugas yang sudah disediakan.</p>
          </div>
        </div>
        <input type="text" placeholder="Berikan komentar" class="mt-4 w-full border-t border-[#B8B8B8] pt-2 text-sm text-[#757575] focus:outline-none" />
      </div>

      <!-- Modul Komentar -->
      <div class="space-y-4">
        <div class="bg-[#F8F8F8] p-4 rounded-xl">
          <div class="flex items-start gap-3">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" class="w-5 h-5 mt-1" alt="book" />
            <div>
              <p class="font-semibold text-sm text-blue">Modul 05: Mastering Business Plan Strategic</p>
              <p class="text-xs text-dark-grey mt-1">19 Mei</p>
            </div>
          </div>
          <input type="text" placeholder="Berikan komentar" class="mt-2 w-full border-t border-[#B8B8B8] pt-2 text-sm text-[#757575] focus:outline-none" />
        </div>
        <div class="bg-[#F8F8F8] p-4 rounded-xl">
          <div class="flex items-start gap-3">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" class="w-5 h-5 mt-1" alt="book" />
            <div>
              <p class="font-semibold text-sm text-blue">Modul 05: Mastering Business Plan Strategic</p>
              <p class="text-xs text-dark-grey mt-1">19 Mei</p>
            </div>
          </div>
          <input type="text" placeholder="Berikan komentar" class="mt-2 w-full border-t border-[#B8B8B8] pt-2 text-sm text-[#757575] focus:outline-none" />
        </div>
      </div>
    </section>
  </main>

  <!-- Footer Menu -->
  <footer class="fixed bottom-0 left-0 right-0 bg-blue text-white py-3 px-10 flex justify-around text-sm">
    <button class="flex flex-col items-center">
      <span class="text-xl">📄</span>
      Forum
    </button>
    <button class="flex flex-col items-center text-dark-grey">
      <span class="text-xl">📋</span>
      Penugasan
    </button>
    <button class="flex flex-col items-center text-dark-grey">
      <span class="text-xl">👥</span>
      Peserta
    </button>
  </footer>
</body>
</html>