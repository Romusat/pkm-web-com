<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

/*
========================================
UPLOAD GAMBAR
========================================
*/
function uploadGambar($file)
{
    $namaFile = $file['name'];
    $tmpName  = $file['tmp_name'];
    $error    = $file['error'];

    if ($error === 4) {
        return false;
    }

    $extValid = ['jpg', 'jpeg', 'png', 'webp'];
    $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if (!in_array($ext, $extValid)) {
        return false;
    }

    $namaBaru = uniqid() . '.' . $ext;
    move_uploaded_file($tmpName, '../uploads/berita/' . $namaBaru);

    return $namaBaru;
}

/*
========================================
TAMBAH BERITA
========================================
*/
if (isset($_POST['tambah'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $isi   = mysqli_real_escape_string($conn, $_POST['isi']);
    $tanggal = date('Y-m-d');

    $gambar = uploadGambar($_FILES['gambar']);

    mysqli_query($conn, "INSERT INTO berita 
    (judul, isi, gambar, tanggal)
    VALUES
    ('$judul','$isi','$gambar','$tanggal')");

    header("Location: berita.php");
    exit;
}

/*
========================================
HAPUS BERITA
========================================
*/
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);

    $cek = mysqli_query($conn, "SELECT gambar FROM berita WHERE id='$id'");
    $old = mysqli_fetch_assoc($cek);

    if ($old && file_exists("../uploads/berita/" . $old['gambar'])) {
        unlink("../uploads/berita/" . $old['gambar']);
    }

    mysqli_query($conn, "DELETE FROM berita WHERE id='$id'");

    header("Location: berita.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Berita Pondok</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background: #f5f7fa;
    }

    .card-box {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
    }

    .title-page {
        color: #198754;
        font-weight: 700;
    }

    .img-thumb {
        width: 100px;
        height: 70px;
        object-fit: cover;
        border-radius: 10px;
    }
    </style>
</head>

<body>

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="title-page">Kelola Berita Pondok</h2>
                <p>Tambah dan kelola berita kegiatan pondok</p>
            </div>

            <a href="dashboard.php" class="btn btn-success">
                ← Kembali Dashboard
            </a>
        </div>

        <div class="row g-4">

            <!-- FORM -->
            <div class="col-lg-4">
                <div class="card card-box p-4">
                    <h4 class="mb-4">Tambah Berita</h4>

                    <form method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label>Judul Berita</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Isi Berita</label>
                            <textarea name="isi" rows="6" class="form-control" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Upload Gambar</label>
                            <input type="file" name="gambar" class="form-control" required>
                        </div>

                        <button type="submit" name="tambah" class="btn btn-success w-100">
                            Simpan Berita
                        </button>

                    </form>
                </div>
            </div>
            <div style="margin-bottom:20px; display:flex; justify-content:flex-end;">

                <a href="export_berita.php" target="_blank" style="
            background:#dc2626;
            color:white;
            padding:12px 24px;
            border-radius:12px;
            text-decoration:none;
            font-weight:600;
            box-shadow:0 8px 20px rgba(0,0,0,0.08);
            display:inline-block;
            transition:0.3s;
       " onmouseover="this.style.background='#b91c1c'" onmouseout="this.style.background='#dc2626'">

                    📄 Download PDF

                </a>

            </div>
            <!-- DATA -->
            <div class="col-lg-8">
                <div class="card card-box p-4">
                    <h4 class="mb-4">Data Berita</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">

                            <thead class="table-success">
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php if(mysqli_num_rows($data) > 0): ?>
                                <?php $no=1; while($row = mysqli_fetch_assoc($data)): ?>

                                <tr>
                                    <td><?= $no++; ?></td>

                                    <td>
                                        <img src="../uploads/berita/<?= $row['gambar']; ?>" class="img-thumb">
                                    </td>

                                    <td><?= $row['judul']; ?></td>
                                    <td><?= $row['tanggal']; ?></td>

                                    <td>
                                        <a href="?hapus=<?= $row['id']; ?>"
                                            onclick="return confirm('Yakin hapus berita?')"
                                            class="btn btn-danger btn-sm">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>

                                <?php endwhile; ?>
                                <?php else: ?>

                                <tr>
                                    <td colspan="5" class="text-center">
                                        Belum ada berita
                                    </td>
                                </tr>

                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>

    </div>

</body>

</html>