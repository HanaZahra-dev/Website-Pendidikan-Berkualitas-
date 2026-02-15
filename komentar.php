<?php
$status = isset($_GET['status']) ? $_GET['status'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Komentar - Pendidikan Berkualitas</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class'
    }
  </script>
  <script>
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.classList.add('dark');
    }
  </script>
  <style>
    .hover-scale { transition: transform 0.3s ease; }
    .hover-scale:hover { transform: scale(1.03); }
    .nav-item.active {
      border-bottom: 3px solid #3b82f6;
      color: #3b82f6;
      font-weight: 600;
    }
  </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 font-sans">

  <!-- Header -->
  <header class="bg-white dark:bg-gray-800 shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
      <div class="flex items-center">
        <img src="https://cdn-icons-png.flaticon.com/512/3976/3976626.png" alt="Logo Pendidikan" class="h-10 mr-3">
        <h1 class="text-2xl font-bold text-blue-600 dark:text-white">Pendidikan Berkualitas</h1>
      </div>
      <nav class="flex items-center">
        <ul class="flex space-x-8">
          <li><a href="beranda.html" class="nav-item py-2 px-1 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition">Beranda</a></li>
          <li><a href="artikel.html" class="nav-item py-2 px-1 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition">Artikel</a></li>
          <li><a href="tentang-kami.html" class="nav-item py-2 px-1 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition">Tentang Kami</a></li>
          <li><a href="kontak.html" class="nav-item py-2 px-1 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition">Kontak</a></li>
          <li><a href="komentar.php" class="nav-item active py-2 px-1 text-gray-700 dark:text-white hover:text-blue-600 transition">Komentar</a></li>
        </ul>
        <button id="dark-toggle" class="ml-4 px-3 py-1 border rounded text-sm text-gray-700 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 transition">
          🌙
        </button>
      </nav>
    </div>
  </header>

  <!-- Komentar Section -->
  <section class="py-16 bg-gradient-to-br from-blue-100 via-white to-blue-200 dark:from-indigo-950 dark:via-gray-900 dark:to-sky-900 transition-all duration-500">
    <div class="container mx-auto px-4 max-w-xl">
      <h2 class="text-3xl font-bold text-center mb-8 text-gray-800 dark:text-white">Komentar</h2>

      <?php if ($status === 'berhasil'): ?>
  <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-6 text-sm text-center shadow-md transition-all duration-300">
    Komentar berhasil dikirim! 🎉
  </div>
  <script>
    if (window.location.search.includes("status=berhasil")) {
      const newUrl = window.location.origin + window.location.pathname;
      window.history.replaceState({}, document.title, newUrl);
    }
  </script>
<?php endif; ?>

      <!-- FORM -->
      <form action="simpan_komentar.php" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
        <div class="mb-4">
          <label for="nama" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Nama</label>
          <input type="text" id="nama" name="nama" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Email</label>
          <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white">
        </div>
        <div class="mb-4">
          <label for="pesan" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Komentar</label>
          <textarea id="pesan" name="pesan" rows="4" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white"></textarea>
        </div>
        <button type="submit" class="bg-purple-600 text-white font-semibold py-2 px-6 rounded-full hover:bg-purple-700 hover-scale transition w-full">KIRIM KOMENTAR</button>
      </form>

      <!-- Link ke daftar komentar -->
      <div class="text-center mt-6">
        <a href="daftar_komentar.php" class="text-blue-600 hover:underline">Lihat komentar lainnya</a>
      </div>
    </div>
  </section>

  <script>
    const toggle = document.getElementById('dark-toggle');
    const html = document.documentElement;
    toggle.addEventListener('click', () => {
      html.classList.toggle('dark');
      localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
    });
  </script>
</body>
</html>
