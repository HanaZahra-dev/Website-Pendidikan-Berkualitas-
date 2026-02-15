<?php
include 'koneksi.php';

$nama     = $_POST['nama'];
$email    = $_POST['email'];
$telepon = $_POST['telepon'];
$kegiatan   = $_POST['kegiatan'];
$pesan    = $_POST['pesan'];

$query = "INSERT INTO relawan (nama, email, telepon, kegiatan, pesan) 
          VALUES ('$nama', '$email', '$telepon', '$kegiatan', '$pesan')";

if (mysqli_query($koneksi, $query)) {
    echo "<script>
            alert('Data berhasil disimpan!');
            window.location.href='relawan.html';
          </script>";
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>

 <script>
    // Saat halaman pertama kali dimuat
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.classList.add('dark'); // aktifkan mode gelap
    }
  </script>  