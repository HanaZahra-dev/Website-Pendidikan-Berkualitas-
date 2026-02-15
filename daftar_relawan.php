<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_pendidikan";

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT nama, email, telepon, kegiatan, pesan FROM relawan ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar Relawan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
    }
  </script>
  <script>
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.classList.add('dark');
    }
  </script>
</head>
<body class="bg-gradient-to-br from-indigo-100 via-white to-sky-100 dark:from-gray-900 dark:via-indigo-950 dark:to-blue-900 text-gray-800 dark:text-gray-100 font-sans min-h-screen">

  <!-- Header -->
  <header class="bg-white dark:bg-gray-800 shadow sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-blue-600 dark:text-blue-400">Daftar Relawan</h1>
      <a href="relawan.html" class="text-sm text-blue-600 dark:text-blue-300 hover:underline hover:font-semibold transition">← Kembali ke Form</a>
    </div>
  </header>

  <!-- Tombol Toggle Dark Mode -->
  <div class="text-right px-4 mt-4">
    <button id="dark-toggle" class="px-3 py-1 border rounded text-sm text-gray-700 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 transition">
      🌙 
    </button>
  </div>

  <!-- Main Content -->
  <main class="px-4 py-10">
  <div class="max-w-5xl mx-auto backdrop-blur-md bg-white/60 dark:bg-white/10 p-6 rounded-3xl shadow-xl border border-blue-200 dark:border-white/10 transition-all duration-300">
  <h2 class="text-3xl font-extrabold mb-8 text-center text-blue-700 dark:text-blue-300">Relawan yang Sudah Bergabung</h2>
      <?php if ($result->num_rows > 0): ?>
        <div class="overflow-x-auto">
          <table class="min-w-full text-left text-sm border border-gray-200 dark:border-gray-700">
            <thead class="bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-200">
              <tr>
                <th class="py-2 px-4 border border-gray-200 dark:border-gray-700">Nama</th>
                <th class="py-2 px-4 border border-gray-200 dark:border-gray-700">Email</th>
                <th class="py-2 px-4 border border-gray-200 dark:border-gray-700">Telepon</th>
                <th class="py-2 px-4 border border-gray-200 dark:border-gray-700">Kegiatan</th>
                <th class="py-2 px-4 border border-gray-200 dark:border-gray-700">Motivasi</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row = $result->fetch_assoc()): ?>
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-200">
                  <td class="py-2 px-4 border border-gray-200 dark:border-gray-700"><?php echo htmlspecialchars($row['nama']); ?></td>
                  <td class="py-2 px-4 border border-gray-200 dark:border-gray-700"><?php echo htmlspecialchars($row['email']); ?></td>
                  <td class="py-2 px-4 border border-gray-200 dark:border-gray-700"><?php echo htmlspecialchars($row['telepon']); ?></td>
                  <td class="py-2 px-4 border border-gray-200 dark:border-gray-700"><?php echo htmlspecialchars($row['kegiatan']); ?></td>
                  <td class="py-2 px-4 border border-gray-200 dark:border-gray-700"><?php echo htmlspecialchars($row['pesan']); ?></td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <p class="text-gray-600 dark:text-gray-300">Belum ada relawan yang terdaftar.</p>
      <?php endif; ?>

      <?php $conn->close(); ?>
    </div>
  </main>

  <!-- Dark mode toggle script -->
  <script>
    const toggle = document.getElementById('dark-toggle');
    const html = document.documentElement;

    toggle.addEventListener('click', () => {
      html.classList.toggle('dark');
      if (html.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
      } else {
        localStorage.setItem('theme', 'light');
      }
    });
  </script>
</body>
</html>
