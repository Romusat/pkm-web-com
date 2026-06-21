<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/database.php';

/*
=====================================
TAMBAH GURU
=====================================
*/
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];

    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];

    if ($foto != '') {
        move_uploaded_file($tmp, '../uploads/' . $foto);

        $conn->query("INSERT INTO guru (nama, jabatan, foto)
                      VALUES ('$nama', '$jabatan', '$foto')");

        header('Location: guru.php');
        exit;
    }
}

/*
=====================================
HAPUS GURU
=====================================
*/
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $conn->query("DELETE FROM guru WHERE id='$id'");

    header('Location: guru.php');
    exit;
}

$data = $conn->query("SELECT * FROM guru ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Guru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-green-50 via-white to-emerald-100 min-h-screen p-8">

    <div class="max-w-7xl mx-auto">

        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-bold text-green-800">Kelola Guru & Tendik</h1>
                <p class="text-gray-600 mt-2">Tambah dan kelola data guru pondok pesantren</p>
            </div>

            <a href="dashboard.php"
                class="bg-white border border-green-600 text-green-700 hover:bg-green-600 hover:text-white px-6 py-3 rounded-xl font-semibold shadow transition duration-300">
                ← Kembali ke Dashboard
            </a>
        </div>

        <div class="grid lg:grid-cols-12 gap-8 items-start">

            <div class="lg:col-span-4 bg-white rounded-3xl shadow-xl p-8 min-h-[780px]">
                <h2 class="text-2xl font-bold text-green-700 mb-6">Tambah Guru</h2>

                <form method="POST" enctype="multipart/form-data" class="space-y-4">
                    <input type="text" name="nama" placeholder="Nama Guru" required
                        class="w-full border rounded-xl p-4">
                    <input type="text" name="jabatan" placeholder="Jabatan" required
                        class="w-full border rounded-xl p-4">
                    <input type="file" name="foto" required class="w-full border rounded-xl p-4">

                    <button type="submit" name="simpan"
                        class="w-full bg-green-600 hover:bg-green-700 text-white py-4 rounded-xl font-semibold">
                        Simpan Guru
                    </button>
                </form>
            </div>

            <div class="lg:col-span-8 grid md:grid-cols-2 xl:grid-cols-2 2xl:grid-cols-3 gap-8 auto-rows-fr">
                <?php while($row = $data->fetch_assoc()): ?>

                <div
                    class="bg-white rounded-3xl shadow-xl overflow-hidden min-h-[420px] flex flex-col justify-between hover:shadow-2xl transition duration-300">
                    <img src="../uploads/<?= $row['foto']; ?>"
                        class="bg-white rounded-3xl shadow-xl p-8 flex justify-between items-center min-h-[140px] hover:shadow-2xl transition duration-300">

                    <div class="p-5">
                        <h3 class="font-bold text-lg"><?= $row['nama']; ?></h3>
                        <p class="text-gray-500 mb-4"><?= $row['jabatan']; ?></p>

                        <a href="?hapus=<?= $row['id']; ?>" onclick="return confirm('Hapus data guru ini?')"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl">
                            Hapus
                        </a>
                    </div>
                </div>

                <?php endwhile; ?>
            </div>

        </div>
    </div>
</body>

</html>