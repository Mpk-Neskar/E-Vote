<?php
session_start();
include '../assets/conn.php';

if (!isset($_SESSION['nisn'])) {
  header('Location: login');
}

$nisn = $_SESSION['nisn'];
$query = "SELECT * FROM voters WHERE nisn='$nisn'";
$result = mysqli_query($conn, $query);

if (!$result) {
  die('Error: ' . mysqli_error($conn)); // handle SQL query error
}
$scarpe = mysqli_query($conn,"SELECT * FROM voters WHERE nisn = '$nisn'");
$row = mysqli_fetch_assoc($scarpe);
$ready = $row['ready'];
$nama_voters = $row['name'];
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Dashboard - E-Vote</title>
    <?php include 'assets/header.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <style>
    body {
        background: linear-gradient(to bottom, #1e90ff, #4169e1); /* Warna gradasi biru */
        color: #fff;
    }

    .navbar {
        background-color: rgba(0, 0, 0, 0.3); /* Warna navbar dengan opasitas */
    }

    .card {
        background-color: rgba(0, 0, 0, 0.5); /* Warna card dengan opasitas */
        color: #fff;
        margin-bottom: 58px;
        transition: transform 0.3s ease-in-out; /* Efek transisi saat hover */
    }

    .card:hover {
        transform: scale(1.05); /* Efek scaling saat hover */
    }

    .card img {
        height: 300px; /* Ukuran gambar card */
        object-fit: cover; /* Memastikan gambar tidak terdistorsi */
    }

    .card-title {
        margin-bottom: 0.5rem; /* Jarak antara judul card dan teks deskripsi */
    }

    .card-text {
        opacity: 0.8; /* Opasitas teks deskripsi */
    }

    .btn {
        margin-top: 0.5rem; /* Jarak antara tombol */
    }
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="../index">
                E-Vote
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../kandidat">Kandidat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../infuser">Informasi Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout">Keluar</a>
                    </li>
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
			<!-- Candidate Card 1 -->
			<form method="POST">
			<div class="col-md-6">
<!-- Candidate Card 1 -->
<div class="col-md-6">
    <div class="card">
        <img src="https://i.pinimg.com/736x/c0/26/2e/c0262eb3af1e95eece5b540471ac5a7b.jpg" class="card-img-top" alt="Candidate 2">
        <div class="card-body">
            <h5 class="card-title">Fatimah Kiranna Azzahra</h5>
            <p class="card-text">Kandidat Ketua MPK Nomor 3 Periode 2023 / 2024</p>
           <button class="btn btn-primary" id="showVisiMisi">Visi Misi</button>
            <button class="btn btn-danger" name="submit">Vote</button>
            <a href="../kandidat" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
	<br><?php include '../assets/footer.php';?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Letakkan di bawah bagian <script> yang sudah ada -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // Menangani klik pada tombol "Visi Misi"
  document.getElementById('showVisiMisi').addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah perilaku default dari tombol

    Swal.fire({
      title: 'Visi Misi Kandidat',
      html: '<strong>Visi:</strong><br>Menjadikan MPK sebagai sarana bagi siswa siswi Neskar agar menjadi lebih baik, juga menjadikan anggota Neskar sebagai Organisasi yang dapat memberikan dampak positif terhadap sekitar.<br><br>' +

            '<strong>Misi:</strong><br>- Meningkatkan komunikasi.<br> - Menjalin kerja sama antar Organisasi juga Ekstrakurikuler lain.<br> - Aktif dalam mengangkat nama MPK.<br>- Megembangkan aspirasi siswa siswi Neskar.',
      icon: 'info',
      confirmButtonText: 'Tutup'
    });
  });
</script>


</body>
</html>
<?php 
	if ($ready == 1) {
		echo"<script>
		window.location = 'already_voted';
		</script>";
  exit();
}
else {
}
		if (isset($_POST['submit'])) {
    echo "
    <script>
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
                // Lakukan pembaruan data (update vote count dan voter status)
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Jika pembaruan berhasil, tampilkan pesan sukses
                            Swal.fire(
                                'Berhasil Voting!!',
                                '$nama_voters Terimakasih telah berpartisipasi dalam melakukan voting!!',
                                'success'
                            ).then(() => {
                                // Redirect ke halaman setelah berhasil voting
                                window.location.href = 'already_voted.php';
                            });
                        } else {
                            // Jika terjadi kesalahan dalam pembaruan data, tampilkan pesan error
                            Swal.fire(
                                'Oops...',
                                'Terjadi kesalahan saat memproses vote. Silakan coba lagi.',
                                'error'
                            );
                        }
                    }
                };
                // Kirim request ke script PHP untuk melakukan pembaruan data pada database
                xhr.open('POST', 'update_vote3.php'); // Ganti 'update_vote.php' dengan nama file PHP yang sesuai
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('vote=yes'); // Kirim data yang dibutuhkan ke dalam script PHP untuk melakukan pembaruan data
            }
        });
    </script>";
}
?>