<?php
$conn = new mysqli("localhost", "root", "", "ponpes_sirojul_quran");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>