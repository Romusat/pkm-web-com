<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ========================================= -->
    <!-- SEO + META + FAVICON -->
    <!-- ========================================= -->

    <title>Pondok Pesantren Sirojul Qur'an | Pendidikan Islam Modern</title>

    <meta name="description"
        content="Website resmi Pondok Pesantren Sirojul Qur'an. Menyediakan informasi profil pondok, kegiatan santri, jadwal kegiatan, berita pondok, pendaftaran santri baru, dan layanan informasi lainnya.">

    <meta name="keywords"
        content="pondok pesantren, pesantren modern, sirojul quran, pondok islam, sekolah islam, ppdb santri, pondok tahfidz">

    <meta name="author" content="Pondok Pesantren Sirojul Qur'an">

    <meta name="robots" content="index, follow">

    <!-- Open Graph / Social Preview -->
    <meta property="og:title" content="Pondok Pesantren Sirojul Qur'an">

    <meta property="og:description" content="Membentuk Generasi Berilmu, Berakhlak, dan Berprestasi">

    <meta property="og:image" content="http://localhost/web_pondok_pesantren/uploads/banner.jpg">

    <meta property="og:url" content="http://localhost/web_pondok_pesantren/">

    <meta property="og:type" content="website">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/web_pondok_pesantren/uploads/logo.png">

    <!-- ========================================= -->
    <!-- Tailwind -->
    <!-- ========================================= -->

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

</head>

<body class="bg-gray-100 font-sans">

    <!-- ================= NAVBAR ================= -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">

            <div class="flex justify-between items-center py-4">

                <!-- LOGO -->
                <div class="flex items-center gap-3">
                    <img src="/web_pondok_pesantren/uploads/logo.png" alt="Logo Pondok" class="h-12 w-12 object-contain"
                        onerror="this.src='https://via.placeholder.com/50'">

                    <div>
                        <h1 class="font-bold text-green-700 text-lg">
                            Pondok Pesantren
                        </h1>
                        <p class="text-xs text-gray-500">
                            Sirojul Qur'an
                        </p>
                    </div>
                </div>

                <!-- MENU DESKTOP -->
                <div class="hidden md:flex items-center gap-6 font-medium">

                    <a href="/web_pondok_pesantren/index.php" class="hover:text-green-600 transition">
                        Beranda
                    </a>

                    <a href="/web_pondok_pesantren/pages/profile.php" class="hover:text-green-600 transition">
                        Profil
                    </a>

                    <a href="/web_pondok_pesantren/pages/galeri.php" class="hover:text-green-600 transition">
                        Galeri
                    </a>

                    <a href="/web_pondok_pesantren/pages/guru.php" class="hover:text-green-600 transition">
                        Guru
                    </a>

                    <a href="/web_pondok_pesantren/pages/kontak.php" class="hover:text-green-600 transition">
                        Kontak
                    </a>

                    <!-- Tombol Donasi -->
                    <a href="/web_pondok_pesantren/pages/donasi.php"
                        class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition font-semibold">
                        Donasi
                    </a>

                    <!-- Tombol Login Admin -->
                    <a href="/web_pondok_pesantren/admin/login.php"
                        class="bg-gray-900 text-white px-5 py-2 rounded-lg hover:bg-black transition font-semibold shadow-md">
                        Login Admin
                    </a>

                </div>

                <!-- MOBILE BUTTON -->
                <button id="menu-btn" class="md:hidden text-3xl">
                    ☰
                </button>

            </div>

            <!-- MOBILE MENU -->
            <div id="mobile-menu" class="hidden flex-col gap-3 pb-4 md:hidden">

                <a href="/web_pondok_pesantren/index.php" class="block">
                    Beranda
                </a>

                <a href="/web_pondok_pesantren/pages/profile.php" class="block">
                    Profil
                </a>

                <a href="/web_pondok_pesantren/pages/galeri.php" class="block">
                    Galeri
                </a>

                <a href="/web_pondok_pesantren/pages/guru.php" class="block">
                    Guru
                </a>

                <a href="/web_pondok_pesantren/pages/kontak.php" class="block">
                    Kontak
                </a>

                <a href="/web_pondok_pesantren/pages/donasi.php" class="block">
                    Donasi
                </a>

                <a href="/web_pondok_pesantren/admin/login.php" class="flex items-center gap-3 px-4 py-3 mt-3 rounded-xl
                    bg-white border border-gray-200
                    hover:bg-green-600 hover:text-white hover:shadow-lg
                    transition-all duration-300 font-semibold">

                    <span class="text-lg">🔐</span>
                    <span>Login Admin</span>

                </a>
            </div>

        </div>
    </nav>

    <!-- ================= SCRIPT ================= -->
    <script>
    const btn = document.getElementById("menu-btn");
    const menu = document.getElementById("mobile-menu");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
    </script>