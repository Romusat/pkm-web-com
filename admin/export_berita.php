<?php
require('../fpdf/fpdf.php');
include '../config/database.php';

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

/*
========================================
HEADER PDF
========================================
*/

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'LAPORAN DATA BERITA PONDOK PESANTREN', 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 8, 'Pondok Pesantren Sirojul Qur\'an', 0, 1, 'C');

$pdf->Ln(5);

/*
========================================
HEADER TABLE
========================================
*/

$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(10, 10, 'No', 1, 0, 'C');
$pdf->Cell(80, 10, 'Judul Berita', 1, 0, 'C');
$pdf->Cell(35, 10, 'Tanggal', 1, 0, 'C');
$pdf->Cell(150, 10, 'Isi Singkat', 1, 1, 'C');

/*
========================================
DATA TABLE
========================================
*/

$query = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC");

$pdf->SetFont('Arial', '', 9);

$no = 1;

while ($row = mysqli_fetch_assoc($query)) {

    $judul = substr($row['judul'], 0, 45);
    $isi = substr(strip_tags($row['isi']), 0, 90) . "...";
    $tanggal = date('d-m-Y', strtotime($row['tanggal']));

    $pdf->Cell(10, 10, $no++, 1, 0, 'C');
    $pdf->Cell(80, 10, $judul, 1, 0);
    $pdf->Cell(35, 10, $tanggal, 1, 0, 'C');
    $pdf->Cell(150, 10, $isi, 1, 1);
}

$pdf->Output('I', 'Laporan_Berita_Pondok.pdf');