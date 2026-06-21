<?php
include '../config/database.php';

$galeri = $conn->query("SELECT * FROM galeri ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Kegiatan</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <!-- HEADER -->
    <section class="bg-green-700 text-white py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">

            <h1 class="text-4xl font-bold mb-4">
                Galeri Kegiatan
            </h1>

            <p class="text-lg text-green-100">
                Dokumentasi kegiatan santri dan aktivitas pondok pesantren
            </p>

        </div>
    </section>


    <!-- GALERI -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-6">

            <?php if($galeri && $galeri->num_rows > 0): ?>

            <div class="grid md:grid-cols-3 gap-8">

                <?php while($g = $galeri->fetch_assoc()): ?>

                <div
                    class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-2xl transition duration-300">

                    <!-- Gambar -->
                    <div class="relative overflow-hidden">

                        <img src="../uploads/<?= $g['foto']; ?>" onclick="openModal(this.src)"
                            class="w-full h-64 object-cover cursor-pointer group-hover:scale-110 transition duration-500">

                        <!-- overlay -->
                        <div
                            class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <button onclick="openModal('../uploads/<?= $g['foto']; ?>')"
                                class="bg-white text-green-700 px-5 py-2 rounded-lg font-semibold shadow">
                                Preview
                            </button>
                        </div>

                    </div>

                    <!-- Konten -->
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-800">
                            Kegiatan Pondok
                        </h3>

                        <p class="text-gray-500 text-sm mt-2">
                            Dokumentasi aktivitas santri dan kegiatan harian pondok
                        </p>
                    </div>

                </div>

                <?php endwhile; ?>

            </div>

            <?php else: ?>

            <div class="text-center bg-white rounded-xl shadow p-10">
                <h3 class="text-xl font-semibold text-gray-700">
                    Belum ada foto kegiatan
                </h3>
                <p class="text-gray-500 mt-2">
                    Silakan upload foto melalui admin panel
                </p>
            </div>

            <?php endif; ?>

        </div>
        <div class="mt-8">
            <a href="../index.php"
                class="inline-block bg-white text-green-700 px-6 py-3 rounded-lg font-semibold shadow hover:bg-gray-100 transition">
                ← Kembali ke Beranda
            </a>
        </div>
    </section>


    <!-- MODAL PREVIEW -->
    <div id="imageModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50">

        <!-- tombol close -->
        <span onclick="closeModal()" class="absolute top-6 right-8 text-white text-5xl cursor-pointer">
            &times;
        </span>

        <!-- gambar preview -->
        <img id="modalImage" class="max-w-5xl max-h-[85vh] rounded-2xl shadow-2xl">

    </div>



    <!-- JS -->
    <script>
    function openModal(src) {
        document.getElementById("imageModal").classList.remove("hidden");
        document.getElementById("imageModal").classList.add("flex");
        document.getElementById("modalImage").src = src;
    }

    function closeModal() {
        document.getElementById("imageModal").classList.add("hidden");
        document.getElementById("imageModal").classList.remove("flex");
    }
    </script>

</body>

</html>