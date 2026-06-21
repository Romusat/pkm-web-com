<!-- FILE BARU: pages/struktur_organisasi.php -->
<!-- halaman khusus Struktur Organisasi -->
<!-- ===================================== -->

<?php
include '../config/database.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <!-- HEADER -->
    <section class="bg-green-700 py-16">
        <div class="max-w-7xl mx-auto px-6 text-center text-white">

            <h1 class="text-4xl font-bold mb-3">
                Struktur Organisasi
            </h1>

            <p class="text-lg opacity-90">
                Susunan kepengurusan dan pimpinan Pondok Pesantren
            </p>

            <a href="../index.php"
                class="inline-block mt-6 bg-white text-green-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-100 transition">
                ← Kembali ke Beranda
            </a>

        </div>
    </section>


    <!-- STRUKTUR ORGANISASI -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6">

            <?php
            $struktur = $conn->query("SELECT * FROM struktur_organisasi ORDER BY urutan ASC");
            ?>

            <?php if ($struktur && $struktur->num_rows > 0): ?>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                <?php while ($s = $struktur->fetch_assoc()): ?>

                <div class="bg-white rounded-3xl shadow-lg overflow-hidden
                                    hover:shadow-2xl transition duration-300 group">

                    <!-- FOTO -->
                    <div class="overflow-hidden">
                        <img src="../uploads/<?= $s['foto']; ?>" onclick="openModal(this.src)" class="w-full h-72 object-cover cursor-pointer
                                           group-hover:scale-105 transition duration-500">
                    </div>

                    <!-- CONTENT -->
                    <div class="p-6 text-center">

                        <h3 class="text-xl font-bold text-gray-800 mb-2">
                            <?= $s['nama']; ?>
                        </h3>

                        <p class="text-green-700 font-medium">
                            <?= $s['jabatan']; ?>
                        </p>

                    </div>

                </div>

                <?php endwhile; ?>

            </div>

            <?php else: ?>

            <div class="bg-white rounded-2xl shadow p-10 text-center">

                <h3 class="text-xl font-semibold text-gray-700">
                    Data struktur organisasi belum tersedia
                </h3>

                <p class="text-gray-500 mt-2">
                    Silakan tambahkan data melalui admin panel
                </p>

            </div>

            <?php endif; ?>

        </div>
    </section>


    <!-- MODAL PREVIEW FOTO -->
    <div id="imageModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50">

        <span onclick="closeModal()" class="absolute top-6 right-8 text-white text-5xl cursor-pointer">

            &times;
        </span>

        <img id="modalImage" class="max-w-4xl max-h-[85vh] rounded-2xl shadow-2xl">

    </div>


    <!-- JAVASCRIPT -->
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