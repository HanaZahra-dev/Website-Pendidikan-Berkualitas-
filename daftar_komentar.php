<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_pendidikan");
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil komentar dari database
$sql = "SELECT nama, email, pesan, tanggal FROM komentar ORDER BY tanggal DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Komentar</title>
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
</head>
<body class="bg-gradient-to-br from-blue-100 via-white to-blue-200 dark:from-indigo-950 dark:via-gray-900 dark:to-sky-900 text-gray-900 dark:text-white min-h-screen transition-all duration-500">
  <div class="container mx-auto px-4 py-16 max-w-2xl">
    <h2 class="text-3xl font-bold mb-6">Daftar Komentar Publik</h2>
    <button id="dark-toggle" class="ml-4 px-3 py-1 border rounded text-sm text-gray-700 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 transition">🌙
        </button>
    <?php if ($result->num_rows > 0): ?>
      <?php while($row = $result->fetch_assoc()): ?>
        <div class="backdrop-blur-md bg-white/60 dark:bg-white/10 border border-blue-200 dark:border-white/10 p-6 rounded-3xl shadow-xl mb-6 transition-all duration-300">
          <p class="font-semibold"><?= htmlspecialchars($row['nama']) ?> <span class="text-sm text-gray-500"> (<?= htmlspecialchars($row['email']) ?>)</span></p>
          <p class="mt-2"><?= nl2br(htmlspecialchars($row['pesan'])) ?></p>
          <p class="text-xs text-gray-500 mt-2">🕒 <?= $row['tanggal'] ?></p>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>Belum ada komentar.</p>
    <?php endif; ?>

    <a href="komentar.php" class="inline-block mt-6 text-blue-600 hover:underline">← Kembali ke halaman komentar</a>
  </div>
  <script>
    const toggle = document.getElementById('dark-toggle');
    const html = document.documentElement;

    toggle.addEventListener('click', () => {
      html.classList.toggle('dark');
      localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
    });
</body>
</html>

<?php
$conn->close();
?>
