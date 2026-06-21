<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

/*
==================================================
TAMBAH DATA
==================================================
*/
if (isset($_POST['tambah'])) {
    $hari = mysqli_real_escape_string($conn, $_POST['hari']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);

    mysqli_query($conn, "INSERT INTO pembimbing (hari, nama)
    VALUES ('$hari','$nama')");

    header("Location: pembimbing.php");
    exit;
}

/*
==================================================
HAPUS DATA
==================================================
*/
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);

    mysqli_query($conn, "DELETE FROM pembimbing WHERE id='$id'");

    header("Location: pembimbing.php");
    exit;
}

/*
==================================================
UPDATE DATA
==================================================
*/
if (isset($_POST['update'])) {
    $id   = intval($_POST['id']);
    $hari = mysqli_real_escape_string($conn, $_POST['hari']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);

    mysqli_query($conn, "UPDATE pembimbing SET
        hari='$hari',
        nama='$nama'
        WHERE id='$id'
    ");

    header("Location: pembimbing.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM pembimbing ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Pembimbing Harian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background: #f5f7fa;
    }

    .card-custom {
        border: none;
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
    }

    .title-page {
        font-weight: 700;
        color: #198754;
    }

    .btn-custom {
        border-radius: 10px;
        padding: 10px 18px;
    }

    table {
        vertical-align: middle !important;
    }
    </style>
</head>

<body>

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="title-page">CRUD Pembimbing Harian</h2>

            <a href="dashboard.php" class="btn btn-success btn-custom">
                ← Kembali ke Dashboard
            </a>
        </div>

        <div class="row g-4">

            <!-- FORM TAMBAH -->
            <div class="col-lg-4">
                <div class="card card-custom p-4">
                    <h4 class="mb-4">Tambah Pembimbing</h4>

                    <form method="POST">

                        <div class="mb-3">
                            <label class="form-label">Hari</label>
                            <input type="text" name="hari" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Pembimbing</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <button type="submit" name="tambah" class="btn btn-success w-100 btn-custom">
                            Simpan Data
                        </button>
                    </form>
                </div>
            </div>

            <!-- TABEL DATA -->
            <div class="col-lg-8">
                <div class="card card-custom p-4">
                    <h4 class="mb-4">Data Pembimbing</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">

                            <thead class="table-success">
                                <tr>
                                    <th width="60">No</th>
                                    <th>Hari</th>
                                    <th>Nama</th>
                                    <th width="220">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; while($row = mysqli_fetch_assoc($data)) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['hari']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td>

                                        <!-- Tombol Edit -->
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#edit<?= $row['id']; ?>">
                                            Edit
                                        </button>

                                        <!-- Tombol Hapus -->
                                        <a href="?hapus=<?= $row['id']; ?>"
                                            onclick="return confirm('Yakin hapus data ini?')"
                                            class="btn btn-danger btn-sm">
                                            Hapus
                                        </a>

                                    </td>
                                </tr>

                                <!-- MODAL EDIT -->
                                <div class="modal fade" id="edit<?= $row['id']; ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <form method="POST">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        Edit Pembimbing
                                                    </h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">

                                                    <div class="mb-3">
                                                        <label>Hari</label>
                                                        <input type="text" name="hari" class="form-control"
                                                            value="<?= $row['hari']; ?>" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama" class="form-control"
                                                            value="<?= $row['nama']; ?>" required>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" name="update" class="btn btn-success">
                                                        Update Data
                                                    </button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <?php endwhile; ?>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>