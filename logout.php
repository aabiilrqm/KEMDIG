<?php
session_start();

// Pastikan koneksi database
include 'db.php';

// Cek apakah session nama tersedia sebelum mencatat log
if (isset($_SESSION['nama'])) {
    $nama = $_SESSION['nama'];
    $aksi = "Logout";
    mysqli_query($conn, "INSERT INTO logs (nama, aksi) VALUES ('$nama', '$aksi')");
}

// Hancurkan session
session_destroy();

// Arahkan kembali ke halaman login
header("Location: login.php");
exit;
?>
