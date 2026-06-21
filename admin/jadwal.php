<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

/*
========================================
TAMBAH DATA
========================================
*/
if (isset($_POST['tambah'])) {
    $jam = mysqli_real_escape_string($conn, $_POST['jam']);
    $kegiatan = mysqli_real_escape_string($conn, $_POST['kegiatan']);
    $keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);

    mysqli_query($conn, "INSERT INTO jadwal (jam, kegiatan, keterangan)
    VALUES ('$jam', '$kegiatan', '$keterangan')");

    header("Location: jadwal.php");
    exit;
}

/*
========================================
HAPUS DATA
========================================
*/
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);

    mysqli_query($conn, "DELETE FROM jadwal WHERE id='$id'");

    header("Location: jadwal.php");
    exit;
}

/*
========================================
UPDATE DATA
========================================
*/
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $jam = mysqli_real_escape_string($conn, $_POST['jam']);
    $kegiatan = mysqli_real_escape_string($conn, $_POST['kegiatan']);
    $keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);

    mysqli_query($conn, "UPDATE jadwal SET
        jam='$jam',
        kegiatan='$kegiatan',
        keterangan='$keterangan'
        WHERE id='$id'
    ");

    header("Location: jadwal.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM jadwal ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Jadwal Kegiatan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background: #f4f8f5;
        font-family: 'Segoe UI', sans-serif;
    }

    .page-title {
        font-weight: 700;
        color: #198754;
    }

    .subtitle {
        color: #666;
        margin-bottom: 30px;
    }

    .card-custom {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
        background: #fff;
    }

    .btn-custom {
        border-radius: 12px;
        padding: 10px 18px;
        font-weight: 600;
    }

    .table th {
        background: #198754;
        color: white;
        border: none;
    }

    .table td {
        vertical-align: middle;
    }

    .form-control {
        border-radius: 12px;
        padding: 12px;
    }

    .badge-custom {
        background: #e8f7ee;
        color: #198754;
        padding: 8px 14px;
        border-radius: 50px;
        font-weight: 600;
    }

    @media(max-width:768px) {
        .mobile-space {
            margin-top: 20px;
        }
    }
    </style>
</head>

<body>

    <div class="container py-5">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
            <div>
                <h2 class="page-title">Kelola Jadwal Kegiatan</h2>
                <p class="subtitle">Tambah dan kelola jadwal kegiatan pondok</p>
            </div>

            <a href="dashboard.php" class="btn btn-outline-success btn-custom">
                ← Kembali ke Dashboard
            </a>
        </div>

        <div class="row g-4">

            <!-- FORM TAMBAH -->
            <div class="col-lg-4">
                <div class="card card-custom p-4">
                    <h3 class="mb-4 text-success fw-bold">Tambah Jadwal</h3>

                    <form method="POST">

                        <div class="mb-3">
                            <label class="form-label">Jam</label>
                            <input type="text" name="jam" class="form-control" placeholder="Contoh: 03.30 - 04.00"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Kegiatan</label>
                            <input type="text" name="kegiatan" class="form-control"
                                placeholder="Contoh: Tahajud / Menghafal" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control"
                                placeholder="Contoh: Aula / Masjid" required>
                        </div>

                        <button type="submit" name="tambah" class="btn btn-success w-100 btn-custom">
                            Simpan Jadwal
                        </button>

                    </form>
                </div>
            </div>

            <!-- DATA -->
            <div class="col-lg-8 mobile-space">
                <div class="card card-custom p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold">Data Jadwal</h3>
                        <span class="badge-custom">
                            Total: <?= mysqli_num_rows($data); ?> Jadwal
                        </span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th width="60">No</th>
                                    <th>Jam</th>
                                    <th>Kegiatan</th>
                                    <th>Keterangan</th>
                                    <th width="220">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php if(mysqli_num_rows($data) > 0): ?>
                                <?php $no = 1; ?>
                                <?php while($row = mysqli_fetch_assoc($data)): ?>

                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['jam']; ?></td>
                                    <td><?= $row['kegiatan']; ?></td>
                                    <td><?= $row['keterangan']; ?></td>
                                    <td>

                                        <!-- Edit -->
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#edit<?= $row['id']; ?>">
                                            Edit
                                        </button>

                                        <!-- Hapus -->
                                        <a href="?hapus=<?= $row['id']; ?>"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')"
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
                                                        Edit Jadwal
                                                    </h5>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>

                                                <div class="modal-body">

                                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">

                                                    <div class="mb-3">
                                                        <label>Jam</label>
                                                        <input type="text" name="jam" class="form-control"
                                                            value="<?= $row['jam']; ?>" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Kegiatan</label>
                                                        <input type="text" name="kegiatan" class="form-control"
                                                            value="<?= $row['kegiatan']; ?>" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Keterangan</label>
                                                        <input type="text" name="keterangan" class="form-control"
                                                            value="<?= $row['keterangan']; ?>" required>
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

                                <?php else: ?>

                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        Belum ada data jadwal kegiatan
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>