<?php
session_start();
include '../config/database.php';

$error = "";

if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");

    if (mysqli_num_rows($query) > 0) {

        $data = mysqli_fetch_assoc($query);

        if ($password == $data['password']) {

            $_SESSION['admin'] = $data['username'];

            header("Location: dashboard.php");
            exit;

        } else {
            echo "
            <script>
                alert('Username atau Password salah!');
                window.location='login.php';
            </script>
            ";
            exit;
        }

    } else {
        echo "
        <script>
            alert('Username atau Password salah!');
            window.location='login.php';
        </script>
        ";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Pondok Pesantren</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body
    class="min-h-screen bg-gradient-to-br from-green-900 via-green-700 to-green-500 flex items-center justify-center px-6">

    <!-- Background Glow -->
    <div class="absolute w-[500px] h-[500px] bg-white/10 rounded-full blur-3xl top-10 left-10"></div>
    <div class="absolute w-[400px] h-[400px] bg-yellow-300/10 rounded-full blur-3xl bottom-10 right-10"></div>

    <!-- Login Card -->
    <div class="relative z-10 w-full max-w-md">

        <div class="bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl p-10">

            <!-- Logo -->
            <div class="text-center mb-8">
                <img src="../uploads/logo.png" class="w-20 h-20 mx-auto mb-4 rounded-full shadow-lg object-cover">

                <h1 class="text-3xl font-bold text-green-700">
                    Admin Login
                </h1>

                <p class="text-gray-500 mt-2">
                    Sistem Informasi Pondok Pesantren
                </p>
            </div>

            <!-- Error -->

            <!-- Form -->
            <form method="POST" class="space-y-6">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Username
                    </label>

                    <input type="text" name="username" required
                        class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Masukkan username">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Password
                    </label>

                    <input type="password" name="password" required
                        class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Masukkan password">
                </div>

                <button type="submit" name="login"
                    class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold py-4 rounded-2xl shadow-lg transition duration-300 hover:scale-[1.02]">

                    Masuk ke Dashboard
                </button>

            </form>

            <!-- Footer -->
            <div class="text-center mt-8">

                <a href="../index.php" class="text-green-700 font-semibold hover:underline">
                    ← Kembali ke Website
                </a>

            </div>

        </div>

    </div>

</body>

</html>