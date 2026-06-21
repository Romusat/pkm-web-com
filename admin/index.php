include '../config/database.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-72 bg-green-800 text-white p-6">
            <h1 class="text-2xl font-bold mb-8">Admin Ponpes</h1>

            <nav class="space-y-3">
                <a href="index.php" class="block px-4 py-3 rounded-lg bg-green-700">Dashboard</a>
                <a href="galeri.php" class="block px-4 py-3 rounded-lg hover:bg-green-700">Foto Kegiatan</a>
                <a href="video.php" class="block px-4 py-3 rounded-lg hover:bg-green-700">Video Kegiatan</a>
                <a href="guru.php" class="block px-4 py-3 rounded-lg hover:bg-green-700">Guru & Tendik</a>
                <a href="jadwal.php" class="block px-4 py-3 rounded-lg hover:bg-green-700">Jadwal Kegiatan</a>
            </nav>
        </aside>

        <!-- CONTENT -->
        <main class="flex-1 p-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Dashboard Admin</h2>

            <div class="grid md:grid-cols-4 gap-6">
                <div class="bg-white rounded-2xl shadow p-6">
                    <p class="text-gray-500">Total Foto</p>
                    <h3 class="text-3xl font-bold text-green-700">12</h3>
                </div>

                <div class="bg-white rounded-2xl shadow p-6">
                    <p class="text-gray-500">Total Video</p>
                    <h3 class="text-3xl font-bold text-green-700">6</h3>
                </div>

                <div class="bg-white rounded-2xl shadow p-6">
                    <p class="text-gray-500">Total Guru</p>
                    <h3 class="text-3xl font-bold text-green-700">15</h3>
                </div>

                <div class="bg-white rounded-2xl shadow p-6">
                    <p class="text-gray-500">Total Jadwal</p>
                    <h3 class="text-3xl font-bold text-green-700">8</h3>
                </div>
            </div>
        </main>
    </div>

</body>

</html>