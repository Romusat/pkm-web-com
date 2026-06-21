<?php
session_start();
include '../config/database.php';

// Hitung total data
$total_foto = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM galeri"));
$total_video = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM video"));
$total_guru = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM guru"));
$total_jadwal = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM jadwal"));
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <div class="min-h-screen flex flex-col md:flex-row">

        <!-- SIDEBAR -->
        <aside class="w-full md:w-72 bg-gradient-to-b from-green-900 to-green-700 text-white shadow-2xl">

            <!-- Header -->
            <div class="p-6 border-b border-white/10">
                <h1 class="text-3xl font-bold leading-tight">
                    Admin Ponpes
                </h1>
                <p class="text-sm text-green-100 mt-2">
                    Sistem Kelola Pondok Pesantren
                </p>
            </div>

            <!-- Menu -->
            <nav class="p-5 space-y-3">

                <a href="dashboard.php"
                    class="flex items-center gap-3 px-5 py-4 rounded-2xl bg-green-500 font-semibold shadow-lg">
                    🏠 Dashboard
                </a>

                <a href="galeri.php" class="flex items-center gap-3 px-5 py-4 rounded-2xl hover:bg-white/10 transition">
                    🖼 Foto Kegiatan
                </a>

                <a href="video.php" class="flex items-center gap-3 px-5 py-4 rounded-2xl hover:bg-white/10 transition">
                    🎥 Video Kegiatan
                </a>

                <a href="guru.php" class="flex items-center gap-3 px-5 py-4 rounded-2xl hover:bg-white/10 transition">
                    👨‍🏫 Guru & Tendik
                </a>

                <a href="jadwal.php" class="flex items-center gap-3 px-5 py-4 rounded-2xl hover:bg-white/10 transition">
                    📅 Jadwal Kegiatan
                </a>
                <a href="berita.php" class="flex items-center gap-3 px-5 py-4 rounded-2xl hover:bg-white/10 transition">
                    📰 Berita Pondok

            </nav>

            <!-- Footer Button -->
            <div class="p-5 space-y-3">

                <a href="../index.php"
                    class="block text-center bg-white text-green-700 font-semibold py-3 rounded-xl shadow">
                    ← Kembali ke Website
                </a>

                <a href="logout.php"
                    class="block text-center bg-red-500 hover:bg-red-600 text-white font-semibold py-3 rounded-xl shadow">
                    Keluar
                </a>

            </div>

        </aside>


        <!-- CONTENT -->
        <main class="flex-1 p-6 md:p-10">

            <div class="mb-8">
                <h2 class="text-4xl font-bold text-gray-800">
                    Admin Dashboard
                </h2>

                <p class="text-gray-500 mt-2">
                    Kelola seluruh data website pondok pesantren dari sini
                </p>
            </div>


            <!-- CARD GRID -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

                <!-- CARD -->
                <div class="bg-white rounded-3xl shadow-lg p-6 border-l-4 border-green-500">
                    <p class="text-gray-500 mb-2">Total Foto</p>
                    <h3 class="text-5xl font-bold text-green-700">
                        <?= $total_foto ?>
                    </h3>
                </div>

                <div class="bg-white rounded-3xl shadow-lg p-6 border-l-4 border-blue-500">
                    <p class="text-gray-500 mb-2">Total Video</p>
                    <h3 class="text-5xl font-bold text-blue-600">
                        <?= $total_video ?>
                    </h3>
                </div>

                <div class="bg-white rounded-3xl shadow-lg p-6 border-l-4 border-yellow-500">
                    <p class="text-gray-500 mb-2">Total Guru</p>
                    <h3 class="text-5xl font-bold text-yellow-600">
                        <?= $total_guru ?>
                    </h3>
                </div>

                <div class="bg-white rounded-3xl shadow-lg p-6 border-l-4 border-purple-500">
                    <p class="text-gray-500 mb-2">Total Jadwal</p>
                    <h3 class="text-5xl font-bold text-purple-600">
                        <?= $total_jadwal ?>
                    </h3>
                </div>

            </div>

        </main>

    </div>

</body>

</html>