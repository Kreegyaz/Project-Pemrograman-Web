
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - PRAKTIKOM</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body class="min-h-screen  p-6 w-150 mx-auto bg-gradient-blue">
    <div class="flex flex-col w-full bg-white m-auto p-10 rounded-2xl shadow-2xl max-w-md">
      <div class="w-full flex justify-center mt-6">
        <img
          src="assets/svg/logo-praktikom.svg"
          alt="Logo PRAKTIKOM"
          class="w-24 h-24 mb-4"
        />
      </div>
      
      <div class="flex flex-col mb-6">
        <h1 class="mb-2 text-center text-3xl font-bold text-blue">Masuk</h1>
        <p class="text-lg text-black text-center">
          Selamat datang. Silakan masuk menggunakan akun UB Anda untuk mengakses
          ekosistem praktikum terintegrasi FILKOM.
        </p>
      </div>

      <form
        id="loginForm"
        class="flex flex-col space-y-4"
        method="POST"
        action="index.php?page=login"
      >
        <input
          type="email"
          id="email"
          name="email"
          placeholder="Email"
          class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#627D99] form-control"
          required
        />

        <input
          type="password"
          id="password"
          name="password"
          placeholder="Password"
          class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#627D99] form-control"
          required
        />
        <button
          id="actionButton"
          type="submit"
          class="bg-gradient-blue text-white rounded-full font-medium py-3 mt-5"
        >
          Log In
        </button>

        <div class="text-center mt-10">
          <a href="index.php?page=register" class="text-sm text-blue underline"
            >Belum punya akun? Daftar di sini</a
          >
        </div>
      </form>
    </div>
  </body>
</html>
