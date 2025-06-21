<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile - PRAKTIKOM</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="../../scripts/profile.js"></script>
    <link rel="stylesheet" href="../../style.css" />
  </head>
  <body class="bg-gradient-blue min-h-screen relative">
    <!-- Header -->
    <div class="flex items-center justify-between px-4 pt-6 text-white">
      <div class="w-5 h-5"></div>
      <h1 class="text-lg font-semibold">Profile</h1>
      <button id="menuButton">
        <img src="../../assets/svg/dots-white-icon.svg" alt="" />
      </button>
    </div>

    <!-- Modal Menu -->
    <div
      id="menuModal"
      class="hidden absolute top-16 right-4 bg-white rounded-lg shadow-md py-2 px-4 text-sm text-gray-800 z-50"
    >
      <button class="block w-full text-left py-1">Pusat bantuan</button>
      <hr class="my-1" />
      <button
        class="block w-full text-left py-1 text-red-500"
        onclick="document.location.href='../../pages/login_page.html'"
      >
        Logout
      </button>
    </div>

    <!-- Profile Info -->
    <div class="text-white flex flex-col items-center mt-4 mb-6">
      <img
        src="../../assets/img/foto-profile.png"
        alt="Profile"
        class="w-20 h-20 rounded-full border-4 border-white"
      />
      <h2 class="mt-2 font-semibold text-lg">Muhammad Irza Dzulhika</h2>
      <p class="text-sm text-gray-300">irzadzulhika@student.ub.ac.id</p>
    </div>

    <!-- Info Card -->
    <div class="bg-white rounded-2xl pt-6 px-4 min-h-screen">
      <div class="bg-[#F3F7F6] p-4 rounded-2xl space-y-2">
        <h3 class="font-bold text-xl text-blue">GENERAL</h3>
        <div>
          <p class="text-xs text-black">Nama</p>
          <p class="font-bold">Muhammad Irza Dzulhika</p>
          <hr class="border-t-1 border-black mb-4" />
        </div>
        <div>
          <p class="text-xs text-black">NIM</p>
          <p class="font-bold">23515040111111</p>
          <hr class="border-t-1 border-black mb-4" />
        </div>
        <div>
          <p class="text-xs text-black">Program Studi</p>
          <p class="font-bold">Sistem Informasi</p>
          <hr class="border-t-1 border-black mb-4" />
        </div>
        <div>
          <p class="text-xs text-black">Angkatan</p>
          <p class="font-bold">2023</p>
          <hr class="border-t-1 border-black mb-4" />
        </div>
      </div>

      <div class="fixed bottom-20 left-1/2 transform -translate-x-1/2">
        <button
          id="daftarAsprakButton"
          class="flex items-center justify-center gap-2 py-4 px-16 rounded-full bg-gradient-blue text-white font-semibold whitespace-nowrap"
        >
          <span>Daftar Asisten Praktikum</span>
          <img
          src="../../assets/svg/chevron-right-white-icon.svg"
          alt=""
          class="w-4 h-4"
          />
        </button>
      </div>
    </div>

    <!-- nav -->
    <nav
      class="subtext px-6 fixed justify-between flex bottom-0 left-0 right-0 bg-blue py-2"
    >
      <button
        class="flex flex-col items-center text-white"
        onclick="handleNavClick('beranda')"
      >
        <img src="../../assets/svg/home-icon.svg" alt="" />
        <p>Beranda</p>
      </button>
      <button
        class="flex flex-col items-center text-white"
        onclick="handleNavClick('kelas')"
      >
        <img src="../../assets/svg/classes-icon.svg" alt="" />
        <p>Kelas</p>
      </button>
      <button
        class="flex flex-col items-center text-white"
        onclick="handleNavClick('pesan')"
      >
        <img src="../../assets/svg/chat-icon.svg" alt="" />
        <p>Pesan</p>
      </button>
      <button
        class="flex flex-col items-center text-orange-pastel"
        onclick="handleNavClick('profile')"
      >
        <img src="../../assets/svg/profile-active-icon.svg" alt="" />
        <p>Profil</p>
      </button>
    </nav>
  </body>
</html>