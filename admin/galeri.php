<?php
include '../config/database.php';

if (isset($_POST['upload'])) {
    $namaFile = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if (!empty($namaFile)) {
        move_uploaded_file($tmp, '../uploads/' . $namaFile);
        $deskripsi = $_POST['deskripsi'];
        mysqli_query($conn, "INSERT INTO galeri (foto, deskripsi) VALUES ('$namaFile', '$deskripsi')");
        header('Location: galeri.php');
        exit;
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM galeri WHERE id='$id'");
    header('Location: galeri.php');
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Foto Kegiatan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen">

    <div class="max-w-7xl mx-auto px-6 py-10">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-10">
            <div>
                <h1 class="text-5xl font-bold text-green-800 mb-2">Kelola Foto Kegiatan</h1>
                <p class="text-gray-600 text-lg">Upload, preview, dan kelola dokumentasi kegiatan pondok pesantren</p>
            </div>

            <a href="dashboard.php"
                class="bg-white border-2 border-green-600 text-green-700 px-8 py-4 rounded-2xl font-semibold shadow-md hover:bg-green-600 hover:text-white transition duration-300">
                ← Kembali ke Dashboard
            </a>
        </div>

        <div class="grid lg:grid-cols-12 gap-8">

            <!-- FORM UPLOAD -->
            <div class="lg:col-span-4">
                <div class="bg-white rounded-3xl shadow-2xl p-8 sticky top-8 border border-green-100">

                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-green-700 mb-2">Upload Foto Baru</h2>
                        <p class="text-gray-500">Tambahkan dokumentasi terbaru kegiatan santri</p>
                    </div>

                    <form method="POST" enctype="multipart/form-data" class="space-y-6">
                        <div>
                            <label class="block text-lg font-semibold text-gray-700 mb-3">Deskripsi Kegiatan</label>
                            <textarea name="deskripsi" rows="4" required
                                placeholder="Contoh: Kegiatan mengaji bersama santri setiap malam Jumat"
                                class="w-full border-2 border-gray-200 rounded-2xl p-4 focus:outline-none focus:border-green-500 bg-gray-50"></textarea>
                        </div>
                        <div>
                            <label class="block text-lg font-semibold text-gray-700 mb-3">Pilih Foto</label>
                            <input type="file" name="foto" required
                                class="w-full border-2 border-gray-200 rounded-2xl p-4 focus:outline-none focus:border-green-500 bg-gray-50">
                        </div>

                        <button type="submit" name="upload"
                            class="w-full bg-gradient-to-r from-green-600 to-green-700 text-white py-4 rounded-2xl font-bold text-lg shadow-lg hover:scale-[1.02] hover:shadow-xl transition duration-300">
                            Upload Sekarang
                        </button>
                    </form>

                    <div class="mt-8 p-5 bg-green-50 rounded-2xl border border-green-100">
                        <p class="text-sm text-gray-600">
                            Tips: gunakan gambar berkualitas baik agar tampilan website lebih profesional.
                        </p>
                    </div>
                </div>
            </div>

            <!-- LIST GALERI -->
            <div class="lg:col-span-8">
                <?php if(mysqli_num_rows($data) > 0): ?>

                <div class="grid md:grid-cols-2 xl:grid-cols-2 gap-8">
                    <?php while($row = mysqli_fetch_assoc($data)): ?>

                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl hover:-translate-y-2 transition duration-300 group">

                        <div class="relative overflow-hidden">
                            <img src="../uploads/<?= $row['foto']; ?>" onclick="openModal(this.src)"
                                class="w-full h-72 object-cover cursor-pointer group-hover:scale-105 transition duration-500">

                            <div
                                class="absolute top-4 right-4 bg-white/90 px-4 py-2 rounded-full text-sm font-semibold text-green-700 shadow">
                                Preview
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="flex justify-between items-center gap-4">
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-800">Foto Kegiatan Pondok</h3>
                                    <p class="text-gray-500 mt-2"><?= $row['deskripsi']; ?></p>
                                </div>

                                <a href="?hapus=<?= $row['id']; ?>"
                                    onclick="return confirm('Yakin ingin menghapus foto ini?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-2xl font-semibold shadow transition">
                                    Hapus
                                </a>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; ?>
                </div>

                <?php else: ?>

                <div class="bg-white rounded-3xl shadow-xl p-16 text-center">
                    <h3 class="text-3xl font-bold text-gray-700 mb-3">Belum Ada Foto</h3>
                    <p class="text-gray-500">Silakan upload foto kegiatan pertama Anda.</p>
                </div>

                <?php endif; ?>
            </div>

        </div>
    </div>

    <!-- MODAL PREVIEW -->
    <div id="imageModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50 px-6">
        <span onclick="closeModal()" class="absolute top-6 right-8 text-white text-5xl cursor-pointer">&times;</span>

        <img id="modalImage" class="max-w-5xl max-h-[85vh] rounded-3xl shadow-2xl border-4 border-white">
    </div>

    <script>
    function openModal(src) {
        document.getElementById('modalImage').src = src;
        document.getElementById('imageModal').classList.remove('hidden');
        document.getElementById('imageModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('imageModal').classList.add('hidden');
        document.getElementById('imageModal').classList.remove('flex');
    }
    </script>

</body>

</html>