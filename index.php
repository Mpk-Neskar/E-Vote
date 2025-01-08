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
            background: #4169e1; /* Gradasi Biru */
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

    <div class="container mt-4">
        <div class="text-center">
            <h1 class="header-title">Selamat Datang Di Website E-Vote Pemilihan Ketua MPK Periode 2025 / 2026</h1>
        </div>

        <div class="content-section">
            <p>E-Vote (Elektronik Voting). Platform yang memberdayakan siswa untuk menyuarakan pendapat mereka dengan penuh keyakinan dan membentuk masa depan sekolah dengan memilih ketua OSIS berikutnya.</p>
            <p>Platform ini mengurangi limbah karena menggunakan teknologi. Pemilih dapat menggunakan laptop, smartphone, atau tablet untuk memberikan suara dengan mudah.</p>

            <!-- Mulai Vote Button -->
            <div class="text-center mt-4">
                <a href="kandidat" class="btn btn-primary btn-lg">Mulai Vote</a>
            </div>

            <!-- Copyright Section -->
            <p class="text-center mt-4 text-sm text-white">
    &copy; 2025 <span class="font-semibold">E-Vote</span>. All rights reserved. 
    <a href="https://github.com/zeonaraa" style="color: #fff; text-decoration: none;">zeonaraa</a> & 
    <a href="https://github.com/woodenhara" style="color: #fff; text-decoration: none;">raven</a>
</p>

        </div>
    </div>
    <?php include 'assets/footer.php'; ?>
</body>
</html>
