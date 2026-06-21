<?php
include '../config/database.php';

if (!isset($_GET['id'])) {
    header("Location: ../index.php");
    exit;
}

$id = intval($_GET['id']);

$query = mysqli_query($conn, "SELECT * FROM berita WHERE id='$id'");
$data  = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Berita tidak ditemukan";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $data['judul']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
    body {
        background: #f8fafc;
    }
    </style>
</head>

<body>

    <!-- HEADER -->
    <section class="bg-green-700 text-white py-14">
        <div class="max-w-5xl mx-auto px-6">
            <a href="../index.php" class="inline-block mb-6 text-sm hover:underline">
                ← Kembali ke Beranda
            </a>

            <h1 class="text-4xl font-bold leading-tight mb-4">
                <?= $data['judul']; ?>
            </h1>

            <p class="text-green-100">
                Dipublikasikan pada
                <?= date('d F Y', strtotime($data['tanggal'])); ?>
            </p>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-6">

            <!-- Gambar -->
            <div class="mb-10">
                <img src="../uploads/berita/<?= $data['gambar']; ?>" alt="<?= $data['judul']; ?>"
                    class="w-full rounded-2xl shadow-lg object-cover max-h-[550px]">
            </div>

            <!-- Isi -->
            <div class="bg-white rounded-2xl shadow-lg p-8 leading-relaxed text-gray-700 text-lg">

                <?= nl2br($data['isi']); ?>

            </div>

            <!-- Tombol Kembali -->
            <div class="mt-10">
                <a href="../index.php"
                    class="inline-block bg-green-600 hover:bg-white-700 text-white px-6 py-3 rounded-xl font-semibold transition">
                    ← Kembali ke Beranda
                </a>
            </div>

        </div>
    </section>

</body>

</html>