<?php
include '../config/database.php';
include '../includes/header.php';
?>

<!-- HERO KONTAK -->
<section class="bg-gradient-to-r from-green-700 to-green-900 text-white py-20">
    <div class="max-w-6xl mx-auto px-6 text-center">

        <h1 class="text-5xl font-bold mb-4">
            Hubungi Kami
        </h1>

        <p class="text-lg text-green-100 max-w-2xl mx-auto">
            Silakan hubungi Pondok Pesantren Sirojul Qur'an untuk informasi pendaftaran,
            donasi, kegiatan pondok, dan informasi lainnya.
        </p>

    </div>
</section>


<!-- INFORMASI KONTAK -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">

        <div class="grid md:grid-cols-2 gap-10">

            <!-- KIRI -->
            <div class="bg-white rounded-3xl shadow-lg p-10">

                <h2 class="text-3xl font-bold text-green-700 mb-8">
                    Informasi Kontak
                </h2>

                <div class="space-y-6 text-gray-700">

                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">
                            📍 Alamat
                        </h3>
                        <p>
                            Jl. Cendrawasih Perumahan Villa Japos Blok D7/12<br>
                            RT 01/08 Jurangmangu Barat, Pondok Aren<br>
                            Tangerang Selatan, Banten
                        </p>
                    </div>

                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">
                            📞 Telepon
                        </h3>
                        <p>0857-7407-4018</p>
                    </div>

                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">
                            ✉️ Email
                        </h3>
                        <p>sirojulqur'an123@gmail.com</p>
                    </div>

                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">
                            🕒 Jam Operasional
                        </h3>
                        <p>
                            Senin - Minggu<br>
                            Pagi, Siang, Sore dan Malam
                        </p>
                    </div>

                </div>

            </div>


            <!-- KANAN -->
            <div class="bg-white rounded-3xl shadow-lg p-10">

                <h2 class="text-3xl font-bold text-green-700 mb-8">
                    Kirim Pesan
                </h2>

                <form action="" method="POST" class="space-y-5">

                    <div>
                        <label class="block font-semibold mb-2">
                            Nama Lengkap
                        </label>
                        <input type="text"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500"
                            placeholder="Masukkan nama lengkap">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2">
                            Email
                        </label>
                        <input type="email"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500"
                            placeholder="Masukkan email">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2">
                            Pesan
                        </label>
                        <textarea rows="5"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500"
                            placeholder="Tulis pesan Anda..."></textarea>
                    </div>

                    <button
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-4 rounded-xl transition">
                        Kirim Pesan
                    </button>

                </form>

            </div>

        </div>

    </div>
</section>


<!-- GOOGLE MAPS -->
<section class="pb-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

            <div class="p-8">
                <h2 class="text-3xl font-bold text-green-700 mb-3">
                    Lokasi Pondok Pesantren
                </h2>
                <p class="text-gray-600">
                    Temukan lokasi kami dengan mudah melalui Google Maps
                </p>
            </div>

            <div class="w-full h-[500px]">
                <iframe
                    src="https://www.google.com/maps?q=Jl.+Cendrawasih+Perumahan+Villa+Japos+Blok+D7/12+Jurangmangu+Barat+Pondok+Aren+Tangerang+Selatan+Banten&output=embed"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>

        </div>

    </div>
</section>

<?php include '../includes/footer.php'; ?>