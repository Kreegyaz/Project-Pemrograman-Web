<!-- view/auth/register.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-white min-h-screen p-6 w-150 mx-auto bg-gradient-blue">
    <div
      class="flex flex-col w-full bg-white m-auto p-10 rounded-2xl shadow-2xl max-w-md"
    >
      <!-- Logo Praktikom  -->
      <div class="w-full flex justify-center mt-6">
        <img
          src="assets/svg/logo-praktikom.svg"
          alt="Logo PRAKTIKOM"
          class="w-24 h-24 mb-4"
        />
      </div>
      <!-- Header -->
      <div class="flex flex-col mb-6">
        <h1 class="mb-2 text-center text-3xl font-bold text-blue">Masuk</h1>
        <p class="text-lg text-black text-center">
          Selamat datang. Silakan masuk menggunakan akun UB Anda untuk mengakses
          ekosistem praktikum terintegrasi FILKOM.
        </p>
      </div>

        <?php if (!empty($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                <?= $success ?>
            </div>
        <?php endif; ?>

      <!-- Form -->
      <form
        id="loginForm"
        class="flex flex-col space-y-4"
        method="POST"
      >
        <input
          id="nama"
          placeholder="Nama"
          type="text"
          name="nama"
          class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#627D99] form-control"
          required
        />
        <input
          id="nim"
          placeholder="Nim"
          type="text"
          name="nim"
          class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#627D99] form-control"
          required
        />
        <select
          id="programStudi"
          placeholder="Program Studi"
          type="text"
          name="prodi"
          class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#627D99] form-control"
          required>
            <option value="">Pilih Program Studi</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Teknologi Informasi">Teknologi Informasi</option>
            <option value="Pendidikan Teknologi Informasi">Pendidikan Teknologi Informasi</option>
            <option value="Teknik Komputer">Teknik Komputer</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
        </select>
       
        <input
          id="angkatan"
          placeholder="Angkatan"
          type="number"
          name="angkatan"
          class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#627D99] form-control"
          required
        />
        <input
          type="email"
          id="email"
          placeholder="Email"
          name="email"
          class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#627D99] form-control"
          required
        />
        <input
          type="password"
          id="password"
          placeholder="Password"
          name="password"
          class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#627D99] form-control"
          required
        />
        <input
          id="password"
          placeholder="Konfirmasi Password"
          type="password"
          name="confirm_password"
          class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#627D99] form-control"
          required
        />

        <div class="text-right">
          <a href="index.php?page=login" class="text-sm text-blue underline"
            >Sudah Punya Akun?</a
          >
        </div>
        <!-- Log In Button -->
        <button
          id="actionButton"
          type="submit"
          class="bg-gradient-blue text-white rounded-full font-medium py-3 mt-5"
        >
          Register
        </button>
      </form>
    </div>
</body>
</html>
