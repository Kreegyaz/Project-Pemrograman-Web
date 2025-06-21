<!-- view/dashboard.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="style.css" />
</head>
<body class="bg-light">
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
        <a href="home_praktikan.html"
          ><h1 class="bg-blue px-6 py-2 rounded-full">Home</h1></a
        >
        <a href="kelas.html"
          ><h1 class="bg-blue px-6 py-2 rounded-full">Dashboard</h1></a
        >
        <a href="chat.html"
          ><h1 class="bg-blue px-6 py-2 rounded-full">Chat</h1></a
        >
      </div>
      <a href="profile.html">
        <img
          src="assets/svg/profile-icon.svg"
          alt=""
          class="w-8 h-8 m-1 p-1 bg-blue rounded-full"
        />
      </a>
    </header>

    <!-- Banner Slider -->
    <div class="w-full h-full px-2 mt-20">
      <div class="swiper rounded-xl overflow-hidden">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img
              src="assets/img/carousel1-img.png"
              alt="Banner 1"
              class="w-full h-[70vh] object-cover"
            />
          </div>
          <div class="swiper-slide">
            <img
              src="assets/img/carousel2-img.jpg"
              alt="Banner 1"
              class="w-full h-[70vh] object-cover"
            />
          </div>
          <div class="swiper-slide">
            <img
              src="assets/img/carousel3-img.png"
              alt="Banner 2"
              class="w-full h-[70vh] object-cover"
            />
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>

    <div class="container mt-5">
        <h2 class="mb-4">Halo, <?= htmlspecialchars($_SESSION['user']['nama']) ?> 👋</h2>
        
        <div class="row g-3">
            <a href="index.php?page=jadwal-tugas" class="btn btn-primary">📅 Jadwal Tugas</a>
            
            <div class="col-6 col-md-3">
                <a href="index.php?page=chat" class="btn btn-info w-100">💬 Chat</a>
            </div>
            <div class="col-6 col-md-3">
                <a href="index.php?page=profile" class="btn btn-success w-100">🙍‍♂️ Profil</a>
            </div>
            <div class="col-6 col-md-3">
                <a href="index.php?page=upload-tugas" class="btn btn-success w-100">📤 Upload Tugas</a>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        new Swiper(".swiper", {
            loop: true,
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
            autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            },
        });
        });
    </script>
</body>
</html>
