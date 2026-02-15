<?php
$host     = "localhost";     // Biasanya tetap localhost
$user     = "root";          // Default user XAMPP
$pass = "";              // Kosongin aja kalau pakai XAMPP
$db       = "db_pendidikan";    // Ganti sesuai nama database kamu


$sql = "SELECT * FROM relawan ORDER BY tanggal DESC";
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
