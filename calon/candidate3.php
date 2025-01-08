<?php
session_start();
include '../assets/conn.php';

if (!isset($_SESSION['nisn'])) {
    header('Location: login');
    exit();
}

$nisn = $_SESSION['nisn'];
$query = "SELECT * FROM voters WHERE nisn='$nisn'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Error: ' . mysqli_error($conn));
}

$scarpe = mysqli_query($conn, "SELECT * FROM voters WHERE nisn = '$nisn'");
$row = mysqli_fetch_assoc($scarpe);
$ready = $row['ready'];
$nama_voters = $row['name'];

if ($ready == 1) {
    echo "<script>window.location = 'already_voted.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Dashboard - E-Vote</title>
    <?php include '../assets/header.php'; ?>
    <style>
        body {
            background: linear-gradient(to bottom, #1e90ff, #4169e1);
            color: #fff;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.3);
        }

        .card {
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            margin-bottom: 58px;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            height: 300px;
            object-fit: cover;
        }

        .card-title {
            margin-bottom: 0.5rem;
        }

        .card-text {
            opacity: 0.8;
        }

        .btn {
            margin-top: 0.5rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="../index">E-Vote</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="../index">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="../kandidat">Kandidat</a></li>
                    <li class="nav-item"><a class="nav-link" href="../infuser">Informasi Pengguna</a></li>
                    <li class="nav-item"><a class="nav-link" href="../logout">Keluar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-1">
        <center>
            <h1 class="my-3">Kandidat Ketua MPK Nomor 3</h1>
        </center>
        <div class="row">
            <center>
                <form method="POST">
                    <div class="col-md-6">
                        <div class="card">
                            <img src="https://i.postimg.cc/MpDxvSWt/nazwha.jpg" class="card-img-top" alt="Candidate 1">
                            <div class="card-body">
                                <h5 class="card-title">Nazwha Amelia</h5>
                                <p class="card-text">Kandidat Ketua MPK Nomor 3 Periode 2025 / 2026</p>
                                <button class="btn btn-primary" id="showVisiMisi">Visi Misi</button>
                                <button class="btn btn-danger" name="submit">Vote</button>
                                <a href="../kandidat" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </center>
        </div>
    </div>

    <?php include '../assets/footer.php'; ?>
    <script>
        document.getElementById('showVisiMisi').addEventListener('click', function (event) {
    event.preventDefault();
    
    Swal.fire({
        title: 'Visi Misi Kandidat',
        html: `
            <strong>Visi:</strong><br>
            Menjadikan MPK SMK Negeri 1 Karawang menjadi organisasi yang dapat ber komunikasi baik,
            berorientasi pada solusi, dan berkontribusi positif bagi masyarakat sekolah.<br><br>

            <strong>Misi:</strong><br>
            - Membangun kolaborasi solid, seperti menjalankan sebuah kegiatan yang melibatkan organisasi lain ataupun pihak sekolah dengan tujuan yang sama.<br>
            - Mewujudkan komunikasi yang baik secara internal maupun eksternal seperti mengadakan forum Musyawarah.<br>
            - Menjalankan, mengevaluasi, dan menemukan solusi dari setiap program kerja agar setiap proker dapat berjalan dengan sebaik-baiknya.<br><br>

            <strong>Proker:</strong><br>
            - "HATUKU" Hari Tukar Buku, teknis dari kegiatan ini, dimana setiap anggota saling bertukar buku yang sudah mereka baca dengan selang waktu dua minggu sekali atau sebulan sekali, kegiatan ini bertujuan untuk bertukar ilmu, meningkatkan minat baca, dan mempererat hubungan keanggotaan.<br>
            - Menjalankan Program kerja yang sudah ada di MPK, seperti, Bank Sampah, E-vote, & 
Management Class = Program kerja ini adalah kegiatan seperti penilaian kelas terbersih. Jangka waktu dari kegiatan ini bisa sekitar 2 Minggu 1x, Tujuan adanya kegiatan ini juga agar tercipta lingkungan kelas yang bersih, rapih, & nyaman. Bisa juga kelas yang terpilih, akan mendapatkan reward, contohnya piala bergilir, yang di mana reward ini pasti akan membuat siswa lebih bersemangat dalan menjalankan kegiatan.<br><br>
        `,
        icon: 'info',
        confirmButtonText: 'Tutup'
    });
});

        <?php if (isset($_POST['submit'])): ?>
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin memberikan suara kepada kandidat ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Saya yakin!',
                cancelButtonText: 'Tidak, Batalkan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                            Swal.fire(
                                'Berhasil Voting!!',
                                'Terimakasih telah berpartisipasi dalam melakukan voting!!',
                                'success'
                            ).then(() => {
                                window.location.href = 'already_voted';
                            });
                        } else {
                            Swal.fire('Oops...', 'Terjadi kesalahan saat memproses vote. Silakan coba lagi.', 'error');
                        }
                    };
                    xhr.open('POST', 'update_vote3.php');
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.send('vote=yes');
                }
            });
        <?php endif; ?>
    </script>

</body>

</html>
