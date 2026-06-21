<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../config/database.php';

if(isset($_POST['upload_video'])){
    $judul = $_POST['judul'];
    $video = $_FILES['file_video']['name'];
    $tmp   = $_FILES['file_video']['tmp_name'];

    move_uploaded_file($tmp, '../uploads/' . $video);
    $conn->query("INSERT INTO video (judul, file_video) VALUES ('$judul','$video')");

    header("Location: video.php");
    exit;
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM video WHERE id='$id'");
    header("Location: video.php");
    exit;
}

$data = $conn->query("SELECT * FROM video ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Video Kegiatan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-green-50 via-white to-emerald-100 min-h-screen p-8">

    <div class="max-w-7xl mx-auto">

        <div class="mb-8 flex justify-between items-center">
            <h1 class="text-4xl font-bold text-green-800">Kelola Video Kegiatan</h1>
            <div>
                <p class="text-gray-600 mt-2">Upload dan kelola dokumentasi video kegiatan pondok pesantren</p>
            </div>

            <a href="dashboard.php"
                class="bg-white border border-green-600 text-green-700 hover:bg-green-600 hover:text-white px-6 py-3 rounded-xl font-semibold shadow transition duration-300">
                ← Kembali ke Dashboard
            </a>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">

            <!-- FORM CARD -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-green-100 sticky top-6">
                    <h2 class="text-2xl font-bold text-green-700 mb-6">Upload Video Baru</h2>

                    <form method="POST" enctype="multipart/form-data" class="space-y-5">

                        <div>
                            <label class="block font-medium mb-2">Judul Video</label>
                            <input type="text" name="judul" required placeholder="Contoh: Haflah Akhirussanah"
                                class="w-full border border-gray-200 rounded-xl p-4 focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block font-medium mb-2">Upload File Video</label>
                            <input type="file" name="file_video" required
                                class="w-full border border-gray-200 rounded-xl p-4">
                        </div>

                        <button type="submit" name="upload_video"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-4 rounded-xl shadow-lg transition duration-300">
                            Upload Sekarang
                        </button>
                    </form>
                </div>
            </div>

            <!-- VIDEO LIST -->
            <div class="lg:col-span-2">
                <div class="grid md:grid-cols-2 gap-6">

                    <?php if($data && $data->num_rows > 0): ?>

                    <?php while($row = $data->fetch_assoc()): ?>

                    <div
                        class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition duration-300">

                        <div class="p-5 border-b">
                            <h3 class="font-bold text-lg text-gray-800">
                                <?= $row['judul']; ?>
                            </h3>
                        </div>

                        <div class="p-5">
                            <video controls class="w-full rounded-2xl shadow-md">
                                <source src="../uploads/<?= $row['file_video']; ?>">
                            </video>
                        </div>

                        <div class="px-5 pb-5 flex justify-between items-center">
                            <span class="text-sm text-gray-500">Video kegiatan pondok</span>

                            <a href="?hapus=<?= $row['id']; ?>"
                                onclick="return confirm('Yakin ingin menghapus video ini?')"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl font-medium">
                                Hapus
                            </a>
                        </div>

                    </div>

                    <?php endwhile; ?>

                    <?php else: ?>

                    <div class="col-span-2 bg-white rounded-3xl shadow-xl p-10 text-center">
                        <h3 class="text-xl font-semibold text-gray-700">Belum ada video kegiatan</h3>
                        <p class="text-gray-500 mt-2">Silakan upload video pertama Anda</p>
                    </div>

                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>

</body>

</html>