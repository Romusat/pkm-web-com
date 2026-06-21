<?php
include 'config/database.php';

$profil = $conn->query("SELECT * FROM profil LIMIT 1")->fetch_assoc();
$galeri = $conn->query("SELECT * FROM galeri ORDER BY id DESC LIMIT 6");
?>

<!-- HERO SECTION -->
<section class="relative h-[650px] bg-cover bg-center" style="background-image: url('uploads/banner.jpg');">

    <div class="absolute inset-0 bg-green-900/60"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 h-full flex items-center">
        <div class="text-white max-w-2xl">

            <h1 class="text-5xl font-bold leading-tight mb-6">
                Membentuk Generasi <br>
                <span class="text-yellow-300">
                    Berilmu, Berakhlak, dan Berprestasi
                </span>
            </h1>

            <p class="text-lg mb-8">
                <?= $profil ? 'Pondok modern berbasis pendidikan Islam untuk membentuk generasi berilmu, berakhlak, dan berprestasi.' : 'Pondok pesantren modern berbasis pendidikan Islam berkualitas.' ?>
            </p>

            <div class="flex gap-4">
                <a href="profile.php" class="bg-green-600 hover:bg-green-700 px-6 py-3 rounded-lg font-semibold">
                    Tentang Kami
                </a>

                <a href="pages/galeri.php"
                    class="border border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-700">
                    Lihat Kegiatan
                </a>
            </div>

        </div>
    </div>
</section>
<?php
$profilLengkap = $conn->query("SELECT * FROM profil LIMIT 1")->fetch_assoc();
?>

<!-- PROFIL PONDOK LENGKAP -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">

        <!-- Judul -->
        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold text-green-700 mb-3">
                Profil Pondok Pesantren
            </h2>
            <p class="text-gray-600">
                Informasi lengkap mengenai identitas pondok pesantren
            </p>
        </div>

        <?php if($profilLengkap): ?>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

            <!-- Header -->
            <div class="bg-green-700 text-white p-8 text-center">
                <h3 class="text-3xl font-bold">
                    <?= $profilLengkap['nama']; ?>
                </h3>
                <p class="mt-2 text-green-100">
                    Profil Lengkap Pondok Pesantren
                </p>
            </div>

            <!-- Isi -->
            <div class="p-8 overflow-x-auto">

                <table class="w-full border-separate border-spacing-y-4">

                    <tr>
                        <td class="font-semibold w-1/3">1. Nama Pondok Pesantren</td>
                        <td>: <?= $profilLengkap['nama']; ?></td>
                    </tr>

                    <tr>
                        <td class="font-semibold">2. Nama Pimpinan Pondok</td>
                        <td>: <?= $profilLengkap['pimpinan']; ?></td>
                    </tr>

                    <tr>
                        <td class="font-semibold">3. Tahun Berdiri</td>
                        <td>: <?= $profilLengkap['tahun_berdiri']; ?></td>
                    </tr>

                    <tr>
                        <td class="font-semibold">4. Alamat Lengkap</td>
                        <td>: <?= $profilLengkap['alamat']; ?></td>
                    </tr>

                    <tr>
                        <td class="font-semibold">5. Nomor HP</td>
                        <td>: <?= $profilLengkap['no_hp']; ?></td>
                    </tr>

                    <tr>
                        <td class="font-semibold">6. Email</td>
                        <td>: <?= $profilLengkap['email']; ?></td>
                    </tr>

                    <tr>
                        <td class="font-semibold">7. Waktu Belajar</td>
                        <td>: <?= $profilLengkap['waktu_belajar']; ?></td>
                    </tr>

                    <tr>
                        <td class="font-semibold">8. Tempat Belajar</td>
                        <td>: <?= $profilLengkap['tempat_belajar']; ?></td>
                    </tr>

                    <tr>
                        <td class="font-semibold">9. Status Tempat</td>
                        <td>: <?= $profilLengkap['status_tempat']; ?></td>
                    </tr>

                    <tr>
                        <td class="font-semibold">10. Materi Pembelajaran</td>
                        <td>: <?= $profilLengkap['materi']; ?></td>
                    </tr>

                    <tr>
                        <td class="font-semibold">11. Jumlah Pengajar</td>
                        <td>: <?= $profilLengkap['jumlah_pengajar']; ?></td>
                    </tr>

                    <tr>
                        <td class="font-semibold">12. Jumlah Santri Mukim</td>
                        <td>: <?= $profilLengkap['jumlah_santri_mukim']; ?></td>
                    </tr>

                    <tr>
                        <td class="font-semibold">13. Jumlah Santri Non Mukim</td>
                        <td>: <?= $profilLengkap['jumlah_santri_non_mukim']; ?></td>
                    </tr>

                    <tr>
                        <td class="font-semibold">14. Kegiatan Lainnya</td>
                        <td>: <?= $profilLengkap['kegiatan_lainnya']; ?></td>
                    </tr>

                    <tr>
                        <td class="font-semibold">15. Pengajian Masyarakat</td>
                        <td>: <?= $profilLengkap['pengajian_masyarakat']; ?></td>
                    </tr>

                    <tr>
                        <td class="font-semibold">16. Sumber Dana</td>
                        <td>: <?= $profilLengkap['sumber_dana']; ?></td>
                    </tr>

                    <tr>
                        <td class="font-semibold">17. Biaya Pondok Pesantren</td>
                        <td>: <?= $profilLengkap['biaya_pondok']; ?></td>
                    </tr>

                </table>

            </div>

        </div>

        <?php else: ?>

        <div class="bg-white rounded-xl shadow p-10 text-center">
            <h3 class="text-xl font-semibold text-gray-700">
                Data profil belum tersedia
            </h3>
            <p class="text-gray-500 mt-2">
                Silakan isi data profil melalui admin panel
            </p>
        </div>

        <?php endif; ?>

    </div>
</section>

<!-- KEUNGGULAN -->
<!-- VISI MISI PREMIUM -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <!-- Judul -->
        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold text-green-700 mb-3">
                Visi & Misi
            </h2>
            <p class="text-gray-600">
                Landasan utama dalam membangun generasi islami yang unggul
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">

            <!-- VISI -->
            <div class="group bg-white border border-gray-100 rounded-2xl shadow-md p-8
                        hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center
                                group-hover:bg-green-600 transition">
                        <span class="text-2xl group-hover:text-white">👁️</span>
                    </div>

                    <h3 class="text-2xl font-bold text-green-700">
                        Visi
                    </h3>
                </div>

                <div class="space-y-3 text-gray-600 leading-relaxed">
                    <?php
                    $visi = $conn->query("SELECT * FROM visi");
                    if($visi && $visi->num_rows > 0):
                        while($v = $visi->fetch_assoc()):
                    ?>
                    <p class="border-l-4 border-green-500 pl-4">
                        <?= $v['isi']; ?>
                    </p>
                    <?php
                        endwhile;
                    else:
                    ?>
                    <p>Belum ada data visi</p>
                    <?php endif; ?>
                </div>

            </div>


            <!-- MISI -->
            <div class="group bg-white border border-gray-100 rounded-2xl shadow-md p-8
                        hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center
                                group-hover:bg-yellow-500 transition">
                        <span class="text-2xl group-hover:text-white">🎯</span>
                    </div>

                    <h3 class="text-2xl font-bold text-green-700">
                        Misi
                    </h3>
                </div>

                <div class="space-y-4 text-gray-600">
                    <?php
                    $misi = $conn->query("SELECT * FROM misi");
                    if($misi && $misi->num_rows > 0):
                        while($m = $misi->fetch_assoc()):
                    ?>
                    <div class="flex items-start gap-3">
                        <span class="text-green-600 text-lg">✔</span>
                        <p><?= $m['isi']; ?></p>
                    </div>
                    <?php
                        endwhile;
                    else:
                    ?>
                    <p>Belum ada data misi</p>
                    <?php endif; ?>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- SECTION SEJARAH -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <!-- Judul -->
        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold text-green-700 mb-3">
                Sejarah Pondok Pesantren
            </h2>
            <p class="text-gray-600">
                Perjalanan berdirinya pondok pesantren hingga menjadi lembaga pendidikan yang berkembang
            </p>
        </div>

        <?php
        $sejarah = $conn->query("SELECT * FROM sejarah ORDER BY id ASC");
        ?>

        <?php if($sejarah && $sejarah->num_rows > 0): ?>

        <div class="relative border-l-4 border-green-600 ml-6">

            <?php while($s = $sejarah->fetch_assoc()): ?>

            <div class="mb-12 ml-8 relative">

                <!-- titik timeline -->
                <div class="absolute -left-12 top-2 w-6 h-6 bg-green-600 rounded-full border-4 border-white shadow-lg">
                </div>

                <!-- card -->
                <div class="bg-gray-50 rounded-2xl shadow-md p-6 hover:shadow-xl transition duration-300">

                    <span
                        class="inline-block bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm font-semibold mb-3">
                        <?= $s['tahun']; ?>
                    </span>

                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                        <?= $s['judul']; ?>
                    </h3>

                    <p class="text-gray-600 leading-relaxed">
                        <?= $s['isi']; ?>
                    </p>

                </div>
            </div>

            <?php endwhile; ?>

        </div>

        <?php else: ?>

        <div class="text-center bg-gray-50 p-10 rounded-xl shadow">
            <h3 class="text-xl font-semibold text-gray-700">
                Data sejarah belum tersedia
            </h3>
            <p class="text-gray-500 mt-2">
                Silakan tambahkan data sejarah melalui database atau admin panel.
            </p>
        </div>

        <?php endif; ?>

    </div>
</section>


<!-- KEGIATAN SANTRI + PREVIEW IMAGE -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">

        <!-- Judul -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-green-700 mb-3">
                Kegiatan Santri
            </h2>
            <p class="text-gray-600">
                Dokumentasi kegiatan harian pondok pesantren
            </p>
        </div>

        <?php
        $galeri = $conn->query("SELECT * FROM galeri ORDER BY id DESC LIMIT 6");
        ?>

        <?php if($galeri && $galeri->num_rows > 0): ?>

        <div class="grid md:grid-cols-3 gap-6">

            <?php while($g = $galeri->fetch_assoc()): ?>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group">

                <!-- IMAGE CLICKABLE -->
                <img src="uploads/<?= $g['foto']; ?>" onclick="openModal(this.src)" class="w-full h-60 object-cover cursor-pointer 
                               group-hover:scale-105 transition duration-300">

                <div class="p-4">
                    <h3 class="font-semibold text-lg text-gray-800">
                        <?= !empty($g['deskripsi']) ? $g['deskripsi'] : 'Kegiatan Pondok'; ?>
                    </h3>
                </div>
            </div>

            <?php endwhile; ?>

        </div>

        <?php else: ?>

        <div class="text-center">
            <p class="text-gray-500">
                Belum ada foto kegiatan
            </p>
        </div>

        <?php endif; ?>

    </div>
</section>
<!-- SECTION VIDEO KEGIATAN -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <!-- Judul -->
        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold text-green-700 mb-3">
                Video Kegiatan
            </h2>
            <p class="text-gray-600">
                Dokumentasi video kegiatan santri dan aktivitas pondok pesantren
            </p>
        </div>

        <?php
        $video = $conn->query("SELECT * FROM video ORDER BY id DESC LIMIT 6");
        ?>

        <?php if($video && $video->num_rows > 0): ?>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php while($v = $video->fetch_assoc()): ?>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">

                <!-- Video -->
                <div class="aspect-video">
                    <video controls class="w-full h-full object-cover">
                        <source src="uploads/<?= $v['file_video']; ?>" type="video/mp4">
                        Browser Anda tidak mendukung video.
                    </video>
                </div>

                <!-- Judul -->
                <div class="p-5">
                    <h3 class="font-bold text-lg text-gray-800 mb-2">
                        <?= $v['judul']; ?>
                    </h3>

                    <p class="text-sm text-gray-500">
                        Video dokumentasi kegiatan pondok pesantren
                    </p>
                </div>

            </div>

            <?php endwhile; ?>

        </div>

        <?php else: ?>

        <div class="text-center bg-gray-50 p-10 rounded-xl shadow">
            <h3 class="text-xl font-semibold text-gray-700">
                Belum ada video kegiatan
            </h3>
            <p class="text-gray-500 mt-2">
                Silakan upload video melalui admin panel.
            </p>
        </div>

        <?php endif; ?>

    </div>
</section>
<!-- SECTION JADWAL KEGIATAN PONDOK -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Judul -->
        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold text-green-700 mb-3">
                Jadwal Kegiatan Pondok
            </h2>
            <p class="text-gray-600">
                Jadwal harian santri Pondok Pesantren Sirojul Qur'an
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">

            <!-- TABEL JADWAL UTAMA -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-xl overflow-hidden">

                <div class="bg-green-700 text-white px-6 py-4">
                    <h3 class="text-xl font-bold">
                        Jadwal Kegiatan Harian
                    </h3>
                </div>

                <?php
                $jadwal = $conn->query("SELECT * FROM jadwal ORDER BY id ASC");
                ?>

                <?php if($jadwal && $jadwal->num_rows > 0): ?>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">

                        <thead class="bg-green-50">
                            <tr>
                                <th class="px-4 py-3 border">No</th>
                                <th class="px-4 py-3 border">Jam</th>
                                <th class="px-4 py-3 border">Kegiatan</th>
                                <th class="px-4 py-3 border">Keterangan</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; ?>
                            <?php while($j = $jadwal->fetch_assoc()): ?>

                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-3 border text-center font-semibold">
                                    <?= $no++; ?>
                                </td>

                                <td class="px-4 py-3 border">
                                    <?= $j['jam']; ?>
                                </td>

                                <td class="px-4 py-3 border">
                                    <?= $j['kegiatan']; ?>
                                </td>

                                <td class="px-4 py-3 border">
                                    <?= $j['keterangan']; ?>
                                </td>
                            </tr>

                            <?php endwhile; ?>
                        </tbody>

                    </table>
                </div>

                <?php else: ?>

                <div class="p-10 text-center">
                    <p class="text-gray-500">
                        Belum ada data jadwal kegiatan
                    </p>
                </div>

                <?php endif; ?>

            </div>


            <!-- TABEL PEMBIMBING -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

                <div class="bg-yellow-500 text-white px-6 py-4">
                    <h3 class="text-xl font-bold">
                        Pembimbing Harian
                    </h3>
                </div>

                <?php
                $pembimbing = $conn->query("SELECT * FROM pembimbing ORDER BY id ASC");
                ?>

                <?php if($pembimbing && $pembimbing->num_rows > 0): ?>

                <table class="w-full text-sm">

                    <thead class="bg-yellow-50">
                        <tr>
                            <th class="px-4 py-3 border">Hari</th>
                            <th class="px-4 py-3 border">Nama</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($p = $pembimbing->fetch_assoc()): ?>

                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 border font-medium">
                                <?= $p['hari']; ?>
                            </td>

                            <td class="px-4 py-3 border">
                                <?= $p['nama']; ?>
                            </td>
                        </tr>

                        <?php endwhile; ?>
                    </tbody>

                </table>

                <?php else: ?>

                <div class="p-10 text-center">
                    <p class="text-gray-500">
                        Data pembimbing belum tersedia
                    </p>
                </div>

                <?php endif; ?>

            </div>

        </div>

        <!-- CATATAN -->
        <div class="mt-8 bg-white rounded-2xl shadow-md p-6 border-l-4 border-green-600">
            <p class="text-gray-700">
                <span class="font-bold text-green-700">Catatan:</span>
                Setiap selesai sholat fardhu wajib membaca Al-Qur'an sebanyak 2 lembar.
            </p>
        </div>

    </div>
</section>
<!-- ========================================= -->
<!-- SECTION BERITA PONDOK -->
<!-- ========================================= -->

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Judul -->
        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold text-green-700 mb-3">
                Berita Pondok
            </h2>
            <p class="text-gray-600">
                Informasi terbaru seputar kegiatan dan pengumuman pondok pesantren
            </p>
        </div>

        <?php
        $berita = $conn->query("SELECT * FROM berita ORDER BY id DESC LIMIT 6");
        ?>

        <?php if($berita && $berita->num_rows > 0): ?>

        <div class="grid md:grid-cols-3 gap-8">

            <?php while($b = $berita->fetch_assoc()): ?>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-2xl transition duration-300">

                <!-- Gambar -->
                <div class="overflow-hidden">
                    <img src="uploads/berita/<?= $b['gambar']; ?>" alt="<?= $b['judul']; ?>"
                        class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">
                </div>

                <!-- Content -->
                <div class="p-6">

                    <p class="text-sm text-gray-500 mb-2">
                        <?= date('d F Y', strtotime($b['tanggal'])); ?>
                    </p>

                    <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">
                        <?= $b['judul']; ?>
                    </h3>

                    <p class="text-gray-600 leading-relaxed mb-4 line-clamp-3">
                        <?= substr($b['isi'], 0, 120); ?>...
                    </p>

                    <a href="pages/detail_berita.php?id=<?= $b['id']; ?>"
                        class="inline-block text-green-700 font-semibold hover:text-green-900 transition">
                        Baca Selengkapnya →
                    </a>

                </div>

            </div>

            <?php endwhile; ?>

        </div>

        <?php else: ?>

        <div class="text-center py-10">
            <p class="text-gray-500 text-lg">
                Belum ada berita terbaru
            </p>
        </div>

        <?php endif; ?>

    </div>
</section>
<!-- GOOGLE MAPS -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <!-- Judul -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-green-700 mb-3">
                Lokasi Pondok Pesantren
            </h2>
            <p class="text-gray-600">
                Temukan lokasi Pondok Pesantren Sirojul Qur'an dengan mudah
            </p>
        </div>

        <!-- Card Maps -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">

            <!-- Alamat -->
            <div class="p-8 bg-green-50 border-b">
                <h3 class="text-2xl font-bold text-green-700 mb-3">
                    📍 Alamat Lengkap
                </h3>

                <p class="text-gray-700 leading-relaxed text-lg">
                    Jl. Cendrawasih Perumahan Villa Japos Blok D7/12<br>
                    Rt. 01/08 Jurangmangu Barat, Pondok Aren<br>
                    Tangerang Selatan, Banten
                </p>
            </div>

            <!-- Google Maps Embed -->
            <div class="w-full h-[500px]">
                <iframe
                    src="https://www.google.com/maps?q=Jl.+Cendrawasih+Perumahan+Villa+Japos+Blok+D7/12+Jurangmangu+Barat+Pondok+Aren+Tangerang+Selatan+Banten&output=embed"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>

    </div>
</section>
<!-- ========================================= -->
<!-- POPUP PENGUMUMAN -->
<!-- ========================================= -->

<div id="popupPengumuman" class="fixed inset-0 bg-black/70 z-50 flex items-center justify-center px-4">

    <div class="bg-white rounded-3xl shadow-2xl max-w-lg w-full p-8 relative animate-fadeIn">

        <!-- Tombol Close -->
        <button onclick="closePopup()"
            class="absolute top-4 right-5 text-gray-500 hover:text-red-500 text-2xl font-bold">
            ×
        </button>

        <!-- Icon -->
        <div class="text-center mb-4">
            <div class="w-20 h-20 mx-auto bg-green-100 rounded-full flex items-center justify-center text-4xl">
                📢
            </div>
        </div>

        <!-- Content -->
        <div class="text-center">

            <h2 class="text-3xl font-bold text-green-700 mb-3">
                Pengumuman Penting
            </h2>

            <p class="text-lg text-gray-700 leading-relaxed mb-6">
                Pendaftaran Santri Baru Tahun Ajaran 2026/2027
                telah dibuka!
                <br><br>
                Segera daftarkan putra-putri Anda
                untuk menjadi generasi Qurani yang unggul.
            </p>

            <a href="donasi.php"
                class="inline-block bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-xl font-semibold transition">
                Lihat Informasi
            </a>

        </div>
    </div>
</div>


<!-- ========================================= -->
<!-- FLOATING WHATSAPP -->
<!-- ========================================= -->

<a href="https://wa.me/6285774074018" target="_blank" class="fixed bottom-6 right-6 z-40 bg-green-500 hover:bg-green-600
          text-white rounded-full shadow-2xl w-16 h-16 flex items-center
          justify-center text-3xl transition duration-300 hover:scale-110">

    💬
</a>


<!-- ========================================= -->
<!-- JAVASCRIPT POPUP -->
<!-- ========================================= -->

<script>
document.addEventListener('DOMContentLoaded', function() {

    const popup = document.getElementById('popupPengumuman');

    // Jika sudah pernah ditutup, jangan tampilkan
    if (localStorage.getItem('popupPengumumanClosed') === 'true') {
        popup.style.display = 'none';
    }

});

function closePopup() {
    document.getElementById('popupPengumuman').style.display = 'none';

    // Simpan status bahwa popup sudah ditutup
    localStorage.setItem('popupPengumumanClosed', 'true');
}
</script>


<!-- ========================================= -->
<!-- ANIMATION -->
<!-- ========================================= -->

<style>
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(.9);
    }

    to {
        opacity: 1;
        transform: scale(1);
    }
}

.animate-fadeIn {
    animation: fadeIn .4s ease;
}
</style>
<!-- MODAL PREVIEW -->
<div id="imageModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50">

    <span onclick="closeModal()" class="absolute top-6 right-8 text-white text-4xl cursor-pointer">
        &times;
    </span>

    <img id="modalImage" class="max-w-4xl max-h-[85vh] rounded-xl shadow-2xl">

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