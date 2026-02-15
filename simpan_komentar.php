<?php
$koneksi = new mysqli("localhost", "root", "", "db_pendidikan");

$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$sql = "INSERT INTO komentar (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

if ($koneksi->query($sql) === TRUE) {
    echo "<script>alert('Komentar berhasil dikirim!'); window.location.href = 'komentar.php';</script>";
} else {
    echo "<script>alert('Gagal menyimpan komentar. Coba lagi.'); window.location.href = 'komentar.php';</script>";
}

$koneksi->close();
?>
