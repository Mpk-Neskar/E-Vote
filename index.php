<?php
session_start();
include 'assets/conn.php';

if (!isset($_SESSION['nisn'])) {
    header('Location: login');
}

$nisn = $_SESSION['nisn'];
$query = "SELECT * FROM voters WHERE nisn='$nisn'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Vote Dashboard</title>
    <?php include 'assets/header.php' ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #1e90ff, #4169e1); /* Gradasi Biru */
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.5); /* Navbar lebih gelap */
        }

        .navbar-brand {
            font-size: 1.5rem; /* Ukuran font yang lebih besar */
        }

        .container {
            max-width: 900px;
        }

        .header-title {
            font-size: 2rem;
            font-weight: 600;
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .content-section {
            margin-top: 30px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 8px;
        }

        .content-section p {
            font-size: 1.1rem;
            line-height: 1.7;
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: #fff;
            background-color: #333;
        }

        @media (max-width: 768px) {
            .header-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index">E-Vote</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kandidat">Kandidat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="infuser">Informasi Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="text-center">
            <h1 class="header-title">Selamat Datang Di Website E-Vote Pemilihan Ketua MPK Periode 2023 / 2024</h1>
        </div>

        <div class="content-section">
            <p>Ini adalah sebuah platform voting online untuk membantu pemilihan ketua MPK di sekolah. Prosesnya mudah, cepat, dan efisien. Dengan teknologi, semua siswa dapat terlibat aktif dalam proses pemilihan.</p>

            <p>Platform ini mengurangi limbah karena menggunakan teknologi. Pemilih dapat menggunakan laptop, smartphone, atau tablet untuk memberikan suara dengan mudah.</p>

            <p>E-Voting MPK memiliki fitur keamanan dan perlindungan data untuk memastikan proses yang adil tanpa kecurangan. Solusi ideal untuk meningkatkan transparansi dan partisipasi dalam pemilihan siswa di sekolah.</p>
        </div>
    </div>
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
